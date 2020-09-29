<?php
/**
 * 2007-2019 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once dirname(__FILE__) . '/vendor/autoload.php';

class LiveChatConnect extends Module
{
    private $apiClient = null;
    private $appUrl = 'https://prestashop.livechatinc.com';

    public function __construct()
    {
        $this->name = 'livechatconnect';
        $this->tab = 'front_office_features';
        $this->version = '1.1.0';
        $this->author = 'LiveChat, Inc.';
        $this->need_instance = 1;
        $this->ps_versions_compliancy = [
            'min' => '1.5',
            'max' => _PS_VERSION_,
        ];
        $this->bootstrap = true;
        $this->module_key = 'f605258b7fa74c836c50948e33d5ca94';

        parent::__construct();

        $this->displayName = $this->l('LiveChat');
        $this->description = $this->l('Powerful live chat and help desk software for business');
        $this->description_full = $this->l(
            'LiveChat is a live chat and messaging platform that can be integrated'
            . ' into your PrestaShop store to help you talk to shoppers in real time.'
            . ' In addition, you can use LiveChat as a contact form to offline messages'
            . ' or even to enable customers to sign up to your mailing list.'
        );
        $this->additional_description = $this->l(
            'Want to communicate with shoppers while they’re kbrowsing your store?'
            . ' With the LiveChat, you can answer incoming sales and support'
            . ' questions as they come in. By talking'
            . ' directly with customers, you can collect real-time customer feedback, boost sales,'
            . ' and manage customer relationships with ease.'
        );
        $this->confirmUninstall = $this->l('Are you sure to uninstall this module ?');
        $this->apiClient = \LiveChatConnect\Services\ApiClient::create(
            version_compare(_PS_VERSION_, '1.6.0', '<')
                ? \LiveChatConnect\Services\Http\CurlDriver::create()
                : \LiveChatConnect\Services\Http\GuzzleDriver::create(),
            $this->getStoredCert(),
            $this->getStoreRegion()
        );

        $userToken = $this->getCurrentUserToken();
        if ($userToken) {
            $this->apiClient->setToken($userToken);
        }
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        $this->setConfiguration('LIVECHATCONNECT_APP_URL', $this->appUrl);
        $this->setConfiguration('LIVECHATCONNECT_APP_REGION', $this->getStoreRegion());
        $this->setConfiguration(
            'LIVECHATCONNECT_PUBLIC_KEY',
            $this->apiClient->getCertForRegion($this->getStoreRegion())
        );
        $this->setConfiguration('LIVECHATCONNECT_AUTHORIZED_USERS', '');

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('actionFeatureValueSave') &&
            $this->installTab();
    }

    private function installTab()
    {
        if (version_compare(_PS_VERSION_, '1.7.5', '<')) {
            return true;
        }

        $tabId = (int) Tab::getIdFromClassName('LiveChatConnectMainController');
        if (!$tabId) {
            $tabId = null;
        }

        $tab = new Tab($tabId);
        $tab->active = 1;
        $tab->class_name = 'LiveChatConnectMainController';
        $tab->name = [];
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = 'LiveChat';
        }
        $tab->id_parent = (int) Tab::getIdFromClassName('SELL');
        $tab->module = $this->name;
        $tab->icon = 'livechat';

        return $tab->save();
    }

    /**
     * @return bool
     */
    public function uninstall()
    {
        if ($beforeUninstall = $this->beforeUninstall()) {
            if ($authorizedUsers = $this->getAuthorizedUsers()) {
                foreach ($authorizedUsers as $userId) {
                    $this->removeUserToken($userId);
                }
            }
            $this->removeConfiguration('LIVECHATCONNECT_STORE_TOKEN');
            $this->removeConfiguration('LIVECHATCONNECT_AUTHORIZED_USERS');
            $this->removeConfiguration('LIVECHATCONNECT_PUBLIC_KEY');
            $this->removeConfiguration('LIVECHATCONNECT_APP_REGION');
            $this->removeConfiguration('LIVECHATCONNECT_APP_URL');
        }

        return $beforeUninstall && parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        if (((bool) Tools::isSubmit('submitLivechatModule')) == true) {
            $this->processSubmit(Tools::getValue('store_token'), Tools::getValue('user_token'));
        }

        $connectRoute = $this->context->link->getAdminLink('AdminModules', true, [
            'route' => 'livechatconnect_connect',
        ]);

        if (version_compare(_PS_VERSION_, '1.7.0', '<')) {
            $connectRoute = $this->context->link->getAdminLink('AdminModules', true)
                . '&configure=' . $this->name
                . '&tab_module=' . $this->tab
                . '&module_name=' . $this->name
                . '&submitLivechatModule=true';
        }

        $this->context->controller->addCSS(
            $this->_path
            . version_compare(_PS_VERSION_, '1.7.0', '<')
                ? 'views/css/configureLegacy.css'
                : 'views/css/configure.css'
        );
        $this->context->smarty->assign('moduleAssetsPath', $this->_path . 'views/');
        $this->context->smarty->assign(
            'appUrl',
            $this->getAppUrl() . (version_compare(_PS_VERSION_, '1.7.0', '<') ? '/' : '/configure')
        );
        $this->context->smarty->assign('lcToken', $this->getCurrentUserToken());
        $this->context->smarty->assign('storeUrl', $this->getStoreUrl());
        $this->context->smarty->assign('storeToken', $this->getStoreToken());
        $this->context->smarty->assign('psVer', _PS_VERSION_);
        $this->context->smarty->assign('sfSupport', version_compare(_PS_VERSION_, '1.7.0', '>=') ? 1 : 0);
        $this->context->smarty->assign('moduleVer', $this->version);
        $this->context->smarty->assign('userEmail', $this->context->employee->email);
        $this->context->smarty->assign('userName', $this->getUserName());
        $this->context->smarty->assign('endpoints', [
            'connect' => $connectRoute,
        ]);

        return $this->context->smarty->fetch(sprintf('%sviews/templates/admin/configure.tpl', $this->local_path));
    }

    /**
     * Add the CSS & JavaScript files you want to be loaded in the BO.
     */
    public function hookBackOfficeHeader()
    {
        $this->context->controller->addCSS($this->_path . 'views/css/back.css');
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     *
     * @return string|null
     */
    public function hookHeader()
    {
        $token = \LiveChatConnect\Services\ConnectToken::load(
            $this->getConfiguration('LIVECHATCONNECT_STORE_TOKEN'),
            $this->getStoredCert()
        );
        if ($storeUUID = $token->getStoreUUID()) {
            $this->smarty->assign([
                'library_url' => Tools::safeOutput(
                    sprintf(
                        'https://%s.livechatinc.com/api/v1/script/%s/widget.js',
                        $token->getApiRegion() === 'eu' ? 'prestashop-eu' : 'prestashop',
                        $storeUUID
                    )
                ),
            ]);

            return $this->display(__FILE__, './views/templates/front/widget.tpl');
        }

        return null;
    }

    /**
     * @param string $storeToken
     * @param string $userToken
     */
    public function processSubmit($storeToken, $userToken)
    {
        if (!$this->validateUserToken($userToken)) {
            throw \LiveChatConnect\Exceptions\InvalidTokenException::user();
        }

        if (!$this->validateStoreToken($storeToken)) {
            throw \LiveChatConnect\Exceptions\InvalidTokenException::store();
        }

        $this->authorizeCurrentUser($userToken);
        $this->setConfiguration('LIVECHATCONNECT_STORE_TOKEN', $storeToken);
    }

    /**
     * @param bool $withBaseUri (by default true)
     *
     * @return string
     */
    public function getStoreUrl($withBaseUri = true)
    {
        return ($this->getConfiguration('PS_SSL_ENABLED')
            ? $this->getConfiguration('PS_SHOP_DOMAIN_SSL')
            : $this->getConfiguration('PS_SHOP_DOMAIN'))
            . ($withBaseUri ? __PS_BASE_URI__ : '/');
    }

    /**
     * @return string
     */
    public function getAppUrl()
    {
        return sprintf(
            '%s/%s',
            $this->getConfiguration('LIVECHATCONNECT_APP_URL', $this->appUrl),
            $this->getConfiguration('LIVECHATCONNECT_APP_REGION', 'us')
        );
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return sprintf('%s %s', $this->context->employee->firstname, $this->context->employee->lastname);
    }

    /**
     * @param string $default
     *
     * @return string
     */
    public function getCurrentUserToken($default = '')
    {
        if (!$this->context->employee || !$userId = $this->context->employee->id) {
            return $default;
        }

        return $this->getConfiguration('LIVECHATCONNECT_USER_' . $userId . '_TOKEN', $default);
    }

    /**
     * @return string
     */
    public function getStoreToken()
    {
        return $this->getConfiguration('LIVECHATCONNECT_STORE_TOKEN', '');
    }

    /**
     * @param string $key
     * @param string $default
     *
     * @return string
     */
    private function getConfiguration($key, $default = '')
    {
        return Configuration::get($key, null, null, null, $default);
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return string
     */
    private function setConfiguration($key, $value)
    {
        return Configuration::updateValue($key, $value);
    }

    /**
     * @param string $key
     *
     * @return string
     */
    private function removeConfiguration($key)
    {
        return Configuration::deleteByName($key);
    }

    /**
     * @param string $userId
     * @param string $token
     *
     * @return string
     */
    private function setUserToken($userId, $token)
    {
        return $this->setConfiguration('LIVECHATCONNECT_USER_' . $userId . '_TOKEN', $token);
    }

    /**
     * @param string $userId
     *
     * @return string
     */
    private function removeUserToken($userId)
    {
        return $this->removeConfiguration('LIVECHATCONNECT_USER_' . $userId . '_TOKEN');
    }

    /**
     * @return array
     */
    private function getAuthorizedUsers()
    {
        return array_values(
            array_filter(
                explode(',', $this->getConfiguration('LIVECHATCONNECT_AUTHORIZED_USERS'))
            )
        );
    }

    /**
     * @param string $token
     *
     * @return bool
     */
    private function authorizeCurrentUser($token)
    {
        if (!$userId = $this->context->employee->id) {
            return false;
        }

        $authorizedUsers = $this->getAuthorizedUsers();
        $authorizedUsers[] = $userId;

        return $this->setConfiguration(
            'LIVECHATCONNECT_AUTHORIZED_USERS',
            implode(',', $authorizedUsers)
        ) && $this->setUserToken($userId, $token);
    }

    /**
     * @return string|null
     */
    private function getStoredCert()
    {
        return $this->getConfiguration('LIVECHATCONNECT_PUBLIC_KEY', null);
    }

    private function beforeUninstall()
    {
        if (!$storeToken = $this->getConfiguration('LIVECHATCONNECT_STORE_TOKEN')) {
            return true;
        }

        $this->apiClient->setToken($storeToken);

        return $this->apiClient->uninstall();
    }

    /**
     * @return string
     */
    private function getStoreRegion()
    {
        return $this->context->country->id_zone === 1 ? 'eu' : 'us';
    }

    /**
     * @param string $userToken
     *
     * @return bool
     */
    private function validateUserToken($userToken)
    {
        $decodedUserToken = \LiveChatConnect\Services\ConnectToken::load(
            $userToken,
            $this->getStoredCert()
        );

        if (!(
            $decodedUserToken->getStoreUUID() &&
            $decodedUserToken->getUserUUID()
        )) {
            return false;
        }

        $this->apiClient->setToken($userToken);

        return true;
    }

    /**
     * @param string $storeToken
     *
     * @return bool
     */
    private function validateStoreToken($storeToken)
    {
        $decodedStoreToken = \LiveChatConnect\Services\ConnectToken::load(
            $storeToken,
            $this->getStoredCert()
        );

        return $decodedStoreToken->getStoreUUID() ? true : false;
    }
}

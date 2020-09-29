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

namespace LiveChatConnect\Controllers;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Tools;

class MainController extends FrameworkBundleAdminController
{
    private $helpCenterLink =
        'https://www.livechat.com/help/prestashop-add-livechat-to-your-store/'
        . '?utm_source=prestashop.com&utm_medium=integration&utm_campaign=prestashop_integration';
    private $module = null;

    public function __construct()
    {
        $this->module = \Module::getInstanceByName('livechatconnect');
    }

    public function indexAction()
    {
        return $this->render('@Modules/livechatconnect/views/templates/admin/index.html.twig', [
            'help_link' => $this->helpCenterLink,
            'moduleAssetsPath' => _MODULE_DIR_ . 'livechatconnect/views/',
            'appUrl' => $this->module->getAppUrl(),
            'lcToken' => $this->module->getCurrentUserToken(),
            'storeToken' => $this->module->getStoreToken(),
            'storeUrl' => $this->module->getStoreUrl(),
            'psVer' => _PS_VERSION_,
            'moduleVer' => $this->module->version,
            'userEmail' => $this->getUser()->getUsername(),
            'userName' => $this->module->getUserName(),
            'endpoints' => [
                'connect' => $this->generateUrl('livechatconnect_connect'),
            ],
        ]);
    }

    public function connectAction(Request $request)
    {
        if ($request->getMethod() === Request::METHOD_OPTIONS) {
            return $this->prepareResponse(Response::HTTP_OK, true);
        }

        try {
            $this->module->processSubmit(Tools::getValue('store_token'), Tools::getValue('user_token'));
        } catch (\Exception $e) {
            return $this->prepareResponse(Response::HTTP_BAD_REQUEST);
        }

        return $this->prepareResponse(Response::HTTP_OK);
    }

    private function headers()
    {
        return [
            'Access-Control-Allow-Origin' => $this->module->getStoreUrl(),
            'Access-Control-Allow-Headers' => 'X-Requested-With, Content-Type, Accept, Origin, Authorization',
            'Access-Control-Allow-Methods' => 'GET, OPTIONS',
            'Content-Type' => 'application/json',
        ];
    }

    private function prepareResponse($status, $isMethodOptions = false)
    {
        $response = new Response();
        $response->headers->add($this->headers());
        $response->setStatusCode($status);

        if ($isMethodOptions) {
            return $response;
        }

        if ($status !== Response::HTTP_OK) {
            $response->setContent(json_encode(['error' => 'Validation error']));
        } else {
            $response->setContent(json_encode(['status' => 'ok']));
        }

        return $response;
    }
}

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

namespace LiveChatConnect\Services;

use Exception;
use Firebase\JWT\JWT;

class ConnectToken
{
    private $token = null;
    private $decodedToken = null;

    public function setToken($token, $cert)
    {
        $this->token = $token;
        try {
            $this->decodedToken = JWT::decode($token, $cert, ['RS256']);
        } catch (Exception $exception) {
            $this->decodedToken = null;

            return false;
        }

        return true;
    }

    public function hasToken()
    {
        return (bool) $this->token;
    }

    public function getToken()
    {
        return $this->hasToken() ? $this->token : null;
    }

    private function getFromToken($key)
    {
        return $this->decodedToken && property_exists($this->decodedToken, $key)
            ? $this->decodedToken->{$key}
            : null;
    }

    public function getApiRegion()
    {
        return $this->getFromToken('apiRegion');
    }

    public function getApiVersion()
    {
        return $this->getFromToken('apiVersion');
    }

    public function getStoreUUID()
    {
        return $this->getFromToken('storeUUID');
    }

    public function getUserUUID()
    {
        return $this->getFromToken('userUUID');
    }

    public static function load($token, $certUri)
    {
        $instance = new ConnectToken();
        $instance->setToken($token, $certUri);

        return $instance;
    }
}

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

namespace LiveChatConnect\Services\Http;

use Exception;
use LiveChatConnect\Exceptions\ApiClientException;
use LiveChatConnect\Exceptions\ErrorCodes;

/**
 * Class CurlDriver
 */
class CurlDriver extends HttpDriver
{
    /**
     * @param string $method
     * @param string $requestUrl
     * @param array $options
     *
     * @return bool|string
     *
     * @throws ApiClientException
     */
    public function makeRequest($method, $requestUrl, $options = [])
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $requestUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            if (array_key_exists('headers', $options)) {
                $parsedHeaders = [];
                foreach ($options['headers'] as $headerKey => $headerValue) {
                    array_push($parsedHeaders, "$headerKey: $headerValue");
                }
                array_push($parsedHeaders, 'Content-Type: application/json; charset=utf-8');
                curl_setopt($ch, CURLOPT_HTTPHEADER, $parsedHeaders);
            }

            if ($method !== 'GET' && $method !== 'OPTIONS') {
                if ($method === 'POST') {
                    curl_setopt($ch, CURLOPT_POST, 1);
                } else {
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                }
                curl_setopt(
                    $ch,
                    CURLOPT_POSTFIELDS,
                    array_key_exists('body', $options) && !empty($options['body'])
                        ? json_encode($options['body'])
                        : '{}'
                );
            }

            $result = curl_exec($ch);
            curl_close($ch);

            return $result;
        } catch (Exception $exception) {
            throw new ApiClientException($exception->getMessage(), ErrorCodes::$HTTP_CLIENT_ERROR, $exception);
        }
    }

    /**
     * @return CurlDriver
     */
    public static function create()
    {
        return new CurlDriver();
    }
}

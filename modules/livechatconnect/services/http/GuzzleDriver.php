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

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use LiveChatConnect\Exceptions\ApiClientException;
use LiveChatConnect\Exceptions\ErrorCodes;

/**
 * Class GuzzleDriver
 */
class GuzzleDriver extends HttpDriver
{
    private $client = null;

    /**
     * GuzzleDriver constructor.
     *
     * @param Client $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param string $method
     * @param string $requestUrl
     * @param array $options
     *
     * @return string
     *
     * @throws ApiClientException
     */
    public function makeRequest($method, $requestUrl, $options = [])
    {
        try {
            return $this->client->send(
                $this->client->createRequest($method, $requestUrl, $options)
            )->getBody()->getContents();
        } catch (RequestException $exception) {
            throw new ApiClientException($exception->getMessage(), ErrorCodes::$HTTP_CLIENT_ERROR, $exception);
        }
    }

    /**
     * @return GuzzleDriver
     */
    public static function create()
    {
        return new GuzzleDriver(new Client());
    }
}

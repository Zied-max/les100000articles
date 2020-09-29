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
use LiveChatConnect\Exceptions\ApiClientException;
use LiveChatConnect\Exceptions\ErrorCodes;
use LiveChatConnect\Exceptions\LiveChatConnectModuleException;
use LiveChatConnect\Services\Http\HttpDriver;

/**
 * Class ApiClient
 */
class ApiClient
{
    private $driver = null;
    private $connectToken = null;
    private $logger = null;
    private $apiUrl = [
        'us' => null,
        'eu' => null,
    ];
    private $defaultRegion = null;
    private $defaultCert = null;

    /**
     * ApiClient constructor.
     *
     * @param HttpDriver $driver
     * @param ConnectToken $connectToken
     * @param Logger $logger
     * @param string $usApiUrl
     * @param string $euApiUrl
     * @param string|null $defaultCert
     * @param string $defaultRegion
     */
    public function __construct(
        $driver,
        $connectToken,
        $logger,
        $usApiUrl,
        $euApiUrl,
        $defaultCert = null,
        $defaultRegion = 'us'
    ) {
        $this->driver = $driver;
        $this->connectToken = $connectToken;
        $this->logger = $logger;
        $this->apiUrl['us'] = $usApiUrl;
        $this->apiUrl['eu'] = $euApiUrl;
        $this->defaultRegion = $defaultRegion;
        $this->defaultCert = $defaultCert ? $defaultCert : $this->getCertForRegion();
    }

    /**
     * @param Exception $exception
     *
     * @return bool
     */
    private function logError($exception)
    {
        $lcException = new LiveChatConnectModuleException($exception->getCode(), $exception);

        return $this->logger->logError($lcException->getMessage(), $lcException->getCode());
    }

    /**
     * @param string $endpoint
     * @param string|null $region
     * @param string|null $apiVersion
     *
     * @return string
     */
    private function getApiUri($endpoint, $region = null, $apiVersion = null)
    {
        return $this->apiUrl[$region ? $region : $this->connectToken->getApiRegion()]
            . '/api/'
            . ($apiVersion ?: $this->connectToken->getApiVersion())
            . '/'
            . $endpoint;
    }

    /**
     * @param string|null $region
     *
     * @return string|bool
     */
    public function getCertForRegion($region = null)
    {
        try {
            $requestUrl = $this->getApiUri(
                'certs/jwt.pem',
                $region ? $region : $this->defaultRegion,
                'v1'
            );

            return $this->driver->makeRequest('GET', $requestUrl);
        } catch (Exception $exception) {
            $this->logError($exception);

            return false;
        }
    }

    /**
     * @param string $token
     * @param string $cert
     *
     * @return bool
     */
    public function setToken($token, $cert = null)
    {
        try {
            if (empty($token)) {
                throw new ApiClientException('Missing auth token', ErrorCodes::$MISSING_AUTH_TOKEN);
            }
            if (!$cert && !$cert = $this->defaultCert) {
                throw new ApiClientException('Missing public key.', ErrorCodes::$MISSING_PUBLIC_KEY);
            }

            return $this->connectToken->setToken($token, $cert);
        } catch (ApiClientException $exception) {
            $this->logError($exception);

            return false;
        }
    }

    /**
     * @return array
     */
    public function headers()
    {
        return [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->connectToken->getToken(),
            'Platform' => 'prestashop',
        ];
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $options
     *
     * @return mixed
     *
     * @throws ApiClientException
     */
    public function makeRequest($method, $endpoint, $options = [])
    {
        if (!$this->connectToken->hasToken()) {
            throw new ApiClientException('Missing auth token');
        }
        if (!array_key_exists('headers', $options)) {
            $options['headers'] = $this->headers();
        }

        return $this->driver->makeRequest($method, $this->getApiUri($endpoint), $options);
    }

    /**
     * @return bool
     */
    public function uninstall()
    {
        try {
            $this->makeRequest('POST', 'uninstall');
        } catch (ApiClientException $exception) {
            $this->logError($exception);

            return false;
        }

        return true;
    }

    /**
     * @param HttpDriver $driver
     * @param string|null $defaultCert
     * @param string $defaultRegion
     *
     * @return ApiClient
     */
    public static function create($driver, $defaultCert = null, $defaultRegion = 'us')
    {
        return new ApiClient(
            $driver,
            new ConnectToken(),
            new Logger(),
            'https://prestashop.livechatinc.com',
            'https://prestashop-eu.livechatinc.com',
            $defaultCert,
            $defaultRegion
        );
    }
}

<?php
declare(strict_types=1);

namespace Weather\WeatherBit\Service;

use GuzzleHttp\Client;
use GuzzleHttp\ClientFactory;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ResponseFactory;
use Magento\Framework\Webapi\Rest\Request;
use Weather\WeatherBit\Model\Config;


class WeatherApiService
{
    /**
     * API request URL
     */
    const API_REQUEST_URI = 'https://api.weatherbit.io/';

    /**
     * API request endpoint
     */
    const API_REQUEST_ENDPOINT = 'v2.0/current';

    /**
     * @var ResponseFactory
     */
    private ResponseFactory $responseFactory;

    /**
     * @var ClientFactory
     */
    private ClientFactory $clientFactory;

    /**
     * @var Config
     */
    private Config $config;

    /**
     * GitApiService constructor
     *
     * @param ClientFactory $clientFactory
     * @param ResponseFactory $responseFactory
     * @param Config $config
     */
    public function __construct(
        ClientFactory $clientFactory,
        ResponseFactory $responseFactory,
        Config $config
    ) {
        $this->clientFactory = $clientFactory;
        $this->responseFactory = $responseFactory;
        $this->config = $config;
    }

    /**
     * Fetch data from API
     */
    public function getWeather(): string
    {
        $params = $this->getParams();
        $response = $this->doRequest(static::API_REQUEST_ENDPOINT, $params);
        $responseContent = $response->getBody()->getContents();
        return $responseContent;
    }

    /**
     * Do API request with provided params
     *
     * @param string $uriEndpoint
     * @param array $params
     * @param string $requestMethod
     *
     * @return Response
     */
    private function doRequest(
        string $uriEndpoint,
        array $params = [],
        string $requestMethod = Request::HTTP_METHOD_GET
    ): Response {
        /** @var Client $client */
        $client = $this->clientFactory->create(['config' => [
            'base_uri' => self::API_REQUEST_URI
        ]]);

        try {
            $response = $client->request(
                $requestMethod,
                $uriEndpoint,
                $params
            );
        } catch (GuzzleException $exception) {
            /** @var Response $response */
            $response = $this->responseFactory->create([
                'status' => $exception->getCode(),
                'reason' => $exception->getMessage()
            ]);
        }

        return $response;
    }

    /**
     * @return array[]
     */
    private function getParams(): array
    {
        return [
            'query' => [
                'key' => $this->config->getApiKey(),
                'city' => $this->config->getCity(),
                'country' => $this->config->getCountryCode()
            ]
        ];
    }
}

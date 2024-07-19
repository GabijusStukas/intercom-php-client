<?php

namespace Intercom;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Resources\Conversations;
use Psr\Http\Message\ResponseInterface;
use stdClass;

class IntercomClient
{
    private const string SDK_VERSION = '0.1.0';

    /**
     * @var Client $httpClient
     */
    private Client $httpClient;

    /**
     * @var Conversations $conversations
     */
    public Conversations $conversations;

    /**
     * IntercomClient constructor.
     *
     * @param string $accessToken
     */
    public function __construct(private readonly string $accessToken)
    {
        $this->conversations = new Conversations($this);

        $this->httpClient = $this->getDefaultHttpClient();
    }

    /**
     * Sends GET request to Intercom API.
     *
     * @param string $endpoint
     * @param array $queryParams
     * @return stdClass
     *
     * @throws IntercomApiException
     */
    public function get(string $endpoint, array $queryParams = []): stdClass
    {
        $response = $this->request('GET', $endpoint, $queryParams);
        return $this->handleResponse($response);
    }

    /**
     * Sends POST request to Intercom API.
     *
     * @param  string $endpoint
     * @param  array $json
     * @return stdClass
     */
    public function post($endpoint, $json): stdClass
    {
        $response = $this->httpClient->request('POST', $endpoint, $json);
        return $this->handleResponse($response);
    }

    /**
     * Sends PUT request to Intercom API.
     *
     * @param  string $endpoint
     * @param  array $json
     * @return stdClass
     */
    public function put($endpoint, $json): stdClass
    {
        $response = $this->httpClient->request('PUT', $endpoint, $json);
        return $this->handleResponse($response);
    }

    /**
     * Sends DELETE request to Intercom API.
     *
     * @param  string $endpoint
     * @param  array $json
     * @return stdClass
     */
    public function delete($endpoint, $json): stdClass
    {
        $response = $this->httpClient->request('DELETE', $endpoint, $json);
        return $this->handleResponse($response);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $options
     *
     * @return ResponseInterface
     * @throws IntercomApiException
     */
    private function request(string $method, string $endpoint, array $options = []): ResponseInterface
    {
        try {
            return $this->httpClient->request($method, $endpoint, $options);
        } catch (GuzzleException $e) {
            throw new IntercomApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @return Client
     */
    private function getDefaultHttpClient(): Client
    {
        return new Client([
            'headers' => $this->getRequestHeaders(),
            'base_uri' => 'https://api.intercom.io/',
        ]);
    }

    /**
     * @return array
     */
    private function getRequestHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->accessToken,
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
            'User-Agent'    => 'Intercom-php-client/' . self::SDK_VERSION,
        ];
    }

    /**
     * @param ResponseInterface $response
     *
     * @return stdClass
     */
    private function handleResponse(ResponseInterface $response): stdClass
    {
        $stream = $response->getBody()->getContents();

        return json_decode($stream);
    }
}

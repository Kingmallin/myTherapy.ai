<?php

namespace App\Models\Ai\Provider;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class OpenAiProvider
{
    private $httpClient;
    private $apiKey;
    private $endpoint;

    public function __construct($apiKey, $endpoint)
    {
        $this->httpClient = new Client();
        $this->apiKey = $apiKey;
        $this->endpoint = $endpoint;
    }

    public function callOpenAiApi($payload)
    {
        try {
            $response = $this->httpClient->post(config('services.openai.endpoint') . $this->endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => $payload
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            throw new \Exception('Error communicating with OpenAI API: ' . $e->getMessage());
        }
    }
}

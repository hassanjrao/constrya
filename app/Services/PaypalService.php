<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PayPalService
{
    private $accessToken;

    public function __construct()
    {
        $this->authenticate();
    }

    private function authenticate()
    {
        // disable ssl verification
        $response = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'))
            ->withOptions([
                'verify' => false,
            ])
            ->post(env('PAYPAL_BASE_URL') . '/v1/oauth2/token', [
                'grant_type' => 'client_credentials',
            ]);

            dd($response->json());

        if ($response->failed()) {
            throw new \Exception('Unable to authenticate with PayPal');
        }

        $this->accessToken = $response->json('access_token');
    }

    public function createProduct($data)
    {
        $response = Http::withToken($this->accessToken)
            ->post(env('PAYPAL_BASE_URL') . '/v1/catalogs/products', $data);

        if ($response->failed()) {
            throw new \Exception('Error creating product: ' . $response->body());
        }

        return $response->json();
    }

    public function createPlan($data)
    {
        $response = Http::withToken($this->accessToken)
            ->post(env('PAYPAL_BASE_URL') . '/v1/billing/plans', $data);

        if ($response->failed()) {
            throw new \Exception('Error creating plan: ' . $response->body());
        }

        return $response->json();
    }
}

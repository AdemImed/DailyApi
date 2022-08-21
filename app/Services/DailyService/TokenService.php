<?php

namespace App\Services\DailyService;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Nowakowskir\JWT\TokenDecoded;
use Nowakowskir\JWT\JWT;
use Nowakowskir\JWT\TokenEncoded;

class TokenService
{
    /**
     * @var string
     */
    private string $authorization;

    public function __construct()
    {
        $this->authorization = config('services.daily.key_type').' '.config('services.daily.key');
    }

    /**
     * @param array $data
     * @return array|JsonResponse|mixed
     */
    public function createTokenFromApi(array $data): mixed
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post(config('services.daily.api_base_url').'meeting-tokens',$data);

        if ($result->status() === 200)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }


    public function generateSelfSignedToken(array $data)
    {
        $payload = [
            'r' => 'payload_key',
            'iat' => 'payload_key',
            'd' => 'payload_key',
        ] ;
        $tokenDecoded = new TokenDecoded(['payload_key' => 'value'], ['header_key' => 'value']);
        $tokenEncoded = $tokenDecoded->encode(config('services.daily.key'), JWT::ALGORITHM_RS256);
    }

    /**
     * @param $meeting_token
     * @return array|JsonResponse|mixed
     */
    public function validateTokenFromApi($meeting_token): mixed
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get(config('services.daily.api_base_url').'meeting-tokens/'.$meeting_token);

        if ($result->status() === 200)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }

    /**
     * @return array|JsonResponse|mixed
     */
    public function getDomainInformation(): mixed
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get(config('services.daily.api_base_url'));

        if ($result->status() === 200)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }

}

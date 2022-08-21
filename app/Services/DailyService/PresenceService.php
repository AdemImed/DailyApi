<?php

namespace App\Services\DailyService;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class PresenceService
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
     * @return array|JsonResponse|mixed
     */
    public function getPresence(): mixed
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get(config('services.daily.api_base_url').'presence');

        if ($result->status() === 200)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }

}

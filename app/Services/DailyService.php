<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class DailyService
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
    public function getRooms(): mixed
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get(config('services.daily.api_base_url').'/rooms');

        if ($result->status() === 200)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }

    /**
     * @param $room_name
     * @return mixed
     */
    public function getRoom($room_name): mixed
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get(config('services.daily.api_base_url').'/rooms/'.$room_name);

        if ($result->status() === 200)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }

    /**
     * @param array $data
     * @return array|JsonResponse|mixed
     */
    public function createRoom(array $data): mixed
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post(config('services.daily.api_base_url').'rooms',$data);

        if ($result->status() === 200)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }

    /**
     * @param $room_name
     * @param array $data
     * @return array|JsonResponse|mixed
     */
    public function updateRoom($room_name,array $data): mixed
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post(config('services.daily.api_base_url').'/rooms/'.$room_name,$data);

        if ($result->status() === 200)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }

    /**
     * @param $room_name
     * @return array|JsonResponse|mixed
     */
    public function deleteRoom($room_name): mixed
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->delete(config('services.daily.api_base_url').'/rooms/'.$room_name);

        if ($result->status() === 200)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }

    public function createToken(array $data)
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

}

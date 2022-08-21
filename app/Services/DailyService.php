<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class DailyService
{
    private string $authorization;

    public function __construct()
    {
        $this->authorization = config('services.daily.key_type').' '.config('services.daily.key');
    }

    public function getRooms()
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

    public function getMeeting($meetingId)
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get(config('services.whereby.api_base_url').$meetingId);

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

    public function deleteMeeting($meetingId): JsonResponse
    {
        $meeting = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get(config('services.whereby.api_base_url').$meetingId);

        if ($meeting->status() != 200)
        {
            return response()->json($meeting->json(),$meeting->status());
        }

        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->delete(config('services.whereby.api_base_url').$meetingId);

        if ($result->status() === 204)
        {
            return response()->json(['message'=>'The resource was deleted successfully']);
        }

        return response()->json($result->json(),$result->status());
    }
}

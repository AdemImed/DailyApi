<?php

namespace App\Http\Controllers\Api\V1\MeetingToken;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingTokenRequest;
use App\Services\DailyService\TokenService;
use Illuminate\Http\JsonResponse;

class MeetingTokenController extends Controller
{
    /**
     * @var TokenService
     */
    private TokenService $daily;

    public function __construct()
    {
        $this->daily = new TokenService();
    }

    /**
     * @param MeetingTokenRequest $request
     * @return array|JsonResponse|mixed
     */
    public function createTokenFromApi(MeetingTokenRequest $request): mixed
    {
        return $this->daily->createTokenFromApi($request->validated());
    }

    /**
     * @param $meeting_token
     * @return array|JsonResponse|mixed
     */
    public function validateTokenFromApi($meeting_token): mixed
    {
        return $this->daily->validateTokenFromApi($meeting_token);
    }

    /**
     * @param MeetingTokenRequest $request
     * @return JsonResponse
     */
    public function generateSelfSignedToken(MeetingTokenRequest $request): JsonResponse
    {
        return $this->daily->generateSelfSignedToken($request->validated());
    }
}

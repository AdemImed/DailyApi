<?php

namespace App\Http\Controllers\Api\V1\MeetingToken;

use App\Http\Controllers\Controller;
use App\Services\DailyService;

class MeetingTokenController extends Controller
{
    /**
     * @var DailyService
     */
    private DailyService $daily;

    public function __construct()
    {
        $this->daily = new DailyService();
    }

//    /**
//     * @param DailyRequest $request
//     * @return array|JsonResponse|mixed
//     */
//    public function createToken(DailyRequest $request): mixed
//    {
//        return $this->daily->createToken($request->validated());
//    }
}

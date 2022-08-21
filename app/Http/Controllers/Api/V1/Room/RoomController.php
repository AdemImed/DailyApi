<?php

namespace App\Http\Controllers\Api\V1\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\DailyRequest;
use App\Services\DailyService;


class RoomController extends Controller
{
    protected $daily;

    public function __construct()
    {
        $this->daily = new DailyService();
    }

    public function getRooms()
    {
        return $this->daily->getRooms();
    }

    public function createToken(DailyRequest $request)
    {
        return $this->daily->createToken($request->validated());
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Services\DailyService;
use Illuminate\Http\JsonResponse;

class RoomController extends Controller
{
    /**
     * @var DailyService
     */
    protected DailyService $daily;

    public function __construct()
    {
        $this->daily = new DailyService();
    }

    /**
     * @return array|JsonResponse|mixed
     */
    public function index(): mixed
    {
        return $this->daily->getRooms();
    }

    /**
     * @param RoomRequest $request
     * @return array|JsonResponse|mixed
     */
    public function store(RoomRequest $request): mixed
    {
        return $this->daily->createRoom($request->validated());
    }

    /**
     * @return array|JsonResponse|mixed
     */
    public function show($room_name): mixed
    {
        return $this->daily->getRoom($room_name);
    }

    /**
     * @param RoomRequest $request
     * @param $room_name
     * @return array|JsonResponse|mixed
     */
    public function update(RoomRequest $request, $room_name): mixed
    {
        return $this->daily->updateRoom($room_name,$request->validated());
    }

    /**
     * @return array|JsonResponse|mixed
     */
    public function destroy($room_name): mixed
    {
        return $this->daily->deleteRoom($room_name);
    }

}

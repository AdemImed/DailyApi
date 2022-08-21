<?php

namespace App\Http\Controllers\Api\V1\Meeting;

use App\Http\Controllers\Controller;
use App\Services\DailyService\MeetingService;

class MeetingController extends Controller
{
    /**
     * @var MeetingService
     */
    private MeetingService $daily;

    public function __construct()
    {
        $this->daily = new MeetingService();
    }

    public function __invoke()
    {
        return $this->daily->getMeetings();
    }
}

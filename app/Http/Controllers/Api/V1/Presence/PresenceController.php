<?php

namespace App\Http\Controllers\Api\V1\Presence;

use App\Http\Controllers\Controller;
use App\Services\DailyService\PresenceService;

class PresenceController extends Controller
{
    /**
     * @var PresenceService
     */
    private PresenceService $daily;

    public function __construct()
    {
        $this->daily = new PresenceService();
    }

    public function __invoke()
    {
        return $this->daily->getPresence();
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Domain;

use App\Http\Controllers\Controller;
use App\Services\DailyService\TokenService;

class DomainController extends Controller
{
    /**
     * @var TokenService
     */
    private TokenService $daily;

    public function __construct()
    {
        $this->daily = new TokenService();
    }

    public function index()
    {
        return $this->daily->getDomainInformation();
    }
}

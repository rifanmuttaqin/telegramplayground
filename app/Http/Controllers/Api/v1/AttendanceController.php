<?php

namespace App\Http\Controllers\Api\v1;

use Telegram\Bot\Api;

class AttendanceController extends BaseMessageHandleController
{
    protected $telegram;

    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Show the bot information.
     */
    public function accountInfo()
    {
        $response = $this->telegram->getMe();
        return $response;
    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class BaseMessageHandleController extends Controller
{
    protected $telegram;

    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    public function commandHandlerWebhook()
    {
        $update = Telegram::commandsHandler(true);
        $chat_id = $update->getChat()->getId();
        $username = $update->getChat()->getFirstName();

        return ['chat_id'=>$chat_id,'username'=>$username,'text'=>$update->getMessage()->getText()];
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

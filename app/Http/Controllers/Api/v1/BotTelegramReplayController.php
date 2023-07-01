<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class BotTelegramReplayController extends BaseMessageHandleController
{
    private $base;

    public function __construct(BaseMessageHandleController $base)
    {
        $this->base = $base;    
    }

    public function replay()
    {
        $response = $this->base->commandHandlerWebhook();
        
        if(strtolower($response['text']) == 'halo'){
            return $this->message($response['chat_id'],'Hai, selamat datang '.$response['username'].' silahkan ketik "perintah" untuk melihat daftar pilihan');
        }  
        
        if(strtolower($response['text']) == 'perintah'){
            return $this->message($response['chat_id'],'Berikut daftar perintah yg dapat kamu gunakan : 
            /absen : untuk absen
            /cekabsen : untuk cek absen kamu');
        }  
    }

    private function message($chat_id,$text)
    {
        return Telegram::sendMessage(['chat_id'=>$chat_id,'text'=>$text]);
    }

}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram\Bot\Laravel\Facades\Telegram;

class setTelegramHook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-telegram-hook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Telegram WebHook URL';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Telegram::setWebhook(['url'=> env('TELEGRAM_WEBHOOK_URL')]);
        dd($response);    
    }
}

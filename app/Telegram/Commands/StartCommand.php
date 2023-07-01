<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Start Command to get you started';

    public function handle()
    {
        $this->replyWithMessage([
            'text' => 'Selamat datang Kak, perkenalkan saya AlBarrSnackSI Sistem Robot yg dibuat oleh Muhammad Rifanul Muttaqin S.Kom!',
        ]);
    }
}
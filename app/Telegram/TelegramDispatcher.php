<?php

namespace App\Telegram;

use App\Jobs\ProcessTelegram;

class TelegramDispatcher
{
    public function sendMessage(string $message, string $chatID = null)
    {
        if (! isset($chatID)) {
            $chatID = env('TELEGRAM_CHAT_ID');
        }

        ProcessTelegram::dispatch($message, $chatID);
    }
}

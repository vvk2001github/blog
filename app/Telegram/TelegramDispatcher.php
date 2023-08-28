<?php

namespace App\Telegram;

use App\Jobs\ProcessTelegram;

class TelegramDispatcher
{
    public function sendMessage(string $message, string $chatID = null)
    {
        if (! isset($chatID)) {
            $chatID = config('telegram.telegram_chat_id');
        }

        ProcessTelegram::dispatch($message, $chatID);
    }
}

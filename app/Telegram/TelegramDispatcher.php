<?php

namespace App\Telegram;

use App\Jobs\ProcessTelegram;
use Illuminate\Support\Facades\Log;

class TelegramDispatcher
{
    public function sendMessage(string $message, string $chatID = null)
    {
        if (! isset($chatID)) {
            $chatID = config('telegram.telegram_chat_id');
        }
        $url = ProcessTelegram::TELEGRAM_URL.config('telegram.telegram_bot_token').'/sendMessage';
        Log::info($url);
        ProcessTelegram::dispatch($message, $chatID);
    }
}

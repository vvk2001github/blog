<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\Response;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ProcessTelegram implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public const TELEGRAM_URL = 'https://api.telegram.org/bot';

    /**
     * Create a new job instance.
     */
    public function __construct(public string $message, public string $chatID)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): Response
    {
        // $url = self::TELEGRAM_URL.env('TELEGRAM_BOT_TOKEN').'/sendMessage?chat_id'.$this->chatID.'&text='.$this->message.'?parse_mode=html';
        $url = self::TELEGRAM_URL.config('telegram.telegram_bot_token').'/sendMessage';

        return Http::post($url, [
            'chat_id' => $this->chatID,
            'text' => $this->message,
            'parse_mode' => 'html',
        ]);
    }
}

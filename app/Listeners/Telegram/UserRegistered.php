<?php

namespace App\Listeners\Telegram;

use App\Facades\Telegram;
use Illuminate\Auth\Events\Registered;

class UserRegistered
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $user = $event->user;
        $message = view('telegram.registered', compact('user'));
        Telegram::sendMessage($message);
        // Log::info($response);
    }
}

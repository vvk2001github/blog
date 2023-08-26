<?php

namespace App\Facades;

use App\Telegram\TelegramDispatcher;
use Illuminate\Support\Facades\Facade;

class Telegram extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TelegramDispatcher::class;
    }
}

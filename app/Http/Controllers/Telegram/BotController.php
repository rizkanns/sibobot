<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;

class TelegramBotController extends Controller
{
	
    /** @var Api */
    protected $telegram;

    /**
     * BotController constructor.
     *
     * @param Api $telegram
     */
    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }
	
    public function getUpdates()
    {
		$update = $this->telegram->commandsHandler(true);
		
		return 'ok';
    }
	
}
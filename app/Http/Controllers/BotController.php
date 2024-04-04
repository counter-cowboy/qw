<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WeStacks\TeleBot\BotManager;
use WeStacks\TeleBot\Laravel\TeleBot;

class BotController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    const API_TOKEN = '5921769353:AAH5-UgHdLYfubuKSyZffWm2Y-sKsLsDGjY';
    const CHANNEL_ID = -1002041262507 ;

    public function __invoke()
    {

        $message = TeleBot::sendMessage([
            'chat_id' => -1002041262507 ,
            'text' => '@cowboyru Oleg112233 Test message',

        ]);
        $update = TeleBot::getUpdates();


        // $updateJson=$update->toJson();
//        $updateToArray=$update->toArray();

        echo "<pre>";
        print_r($update);
    }
}

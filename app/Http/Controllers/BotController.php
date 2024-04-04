<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Employee;
use Illuminate\Http\Request;
use WeStacks\TeleBot\BotManager;
use WeStacks\TeleBot\Laravel\TeleBot;
use function Sodium\add;

class BotController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
      const CHANNEL_ID = -1002041262507;

    public function __invoke()
    {
        Comment::find()->where();
        $adresates = Employee::all();
        Comment::create([
            'task_id'=>1,
            'employee_id'=>1,
           'comment'=>'2 Some new comment',
        ]);

        foreach ($adresates as $address) {
            $name = $address['nickname'];
            $task = $address->tasks()->get();

            foreach ($task as $item) {
                $taskTitle = $item['title'];
                $letter = TeleBot::sendMessage([
                    'chat_id' => -1002041262507,
                    'text' => "$name whats up with task $taskTitle ?",
                ]);
            }
        }

        $updateId = 0;

        echo "<pre>";

        while (true) {
            $update = TeleBot::getUpdates([
                'offset' => $updateId
            ]);
            $updateId++;
            print_r($update);
            sleep(1);
        }




//        $message = TeleBot::sendMessage([
//            'chat_id' => -1002041262507 ,
//            'text' => '@cowboyru Oleg112233 Test message', ]);


    }
}

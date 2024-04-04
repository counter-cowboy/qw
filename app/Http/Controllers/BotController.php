<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    const CHANNEL_ID = -1002041262507;

    public function __invoke()
    {
        Comment::create([
            'task_id'=>3,
            'employee_id'=> 2,
            'comment'=>'new comment for serg'
        ]);

        $adresates = Employee::all();


        foreach ($adresates as $address) {
            $empId = $address['id'];

            $latestTask = DB::table('comments')
                ->where('employee_id', $empId)
                ->orderBy('updated_at', 'desc')
                ->first();

            if ($latestTask) {
                $taskId = $latestTask->task_id;

                $userTaskByLastComment = Task::find($taskId);

                $userTask = $userTaskByLastComment->title;

                $name = $address['nickname'];
//                $task = $address->tasks()->get();

                $letter = TeleBot::sendMessage([
                    'chat_id' => -1002041262507,
                    'text' => "$name whats up with task $userTask ?"]);
            }
            else
                $taskId=null;
        }



    }
}

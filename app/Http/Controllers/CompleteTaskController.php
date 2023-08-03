<?php

namespace App\Http\Controllers;

use App\Events\TaskCompleted;
use App\Models\Task;
use Illuminate\Http\Request;

class CompleteTaskController extends Controller
{
    public function __invoke(Task $task)
    {
        $task->completed = true;
        $task->save();

        event(new TaskCompleted($task));

        return redirect()->back();
    }
}

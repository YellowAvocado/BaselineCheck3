<?php

namespace App\Http\Controllers;

use App\Events\TaskCompleted;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskCompletedNotification;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function markCompleted(Task $task)
    {

        $task->update(['completed' => true]);

        event(new TaskCompleted($task));

        return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
    }

}

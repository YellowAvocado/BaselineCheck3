<?php

namespace App\Listeners;

use App\Events\TaskCompleted;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskCompletedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TaskCompletedListener
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\TaskCompleted $event
     * @return void
     */
    /*public function markCompleted(Task $task)
    {
        $task->update(['completed' => true]);

        // Fire the TaskCompleted event
        event(new TaskCompleted($task));*/


    public function handle(TaskCompleted $event)
    {
        $task = $event->task;
        $user = $task->user;

        $user->notify(new TaskCompletedNotification($task));
    }
}

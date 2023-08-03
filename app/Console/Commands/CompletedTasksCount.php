<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Models\User;
use App\Notifications\CompletedTasksNotification;
use Illuminate\Console\Command;

class CompletedTasksCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:completed-tasks-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $completedTaskCount = Task::where('user_id', $user->id)
                ->where('completed', true)
                ->count();}

        $user->notify(new CompletedTasksNotification($completedTaskCount));

        $this->info('completed');
    }

}

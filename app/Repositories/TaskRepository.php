<?php

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Task::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }

    /**
     * Get the task for given task id.
     *
     * @param  Task $task
     * @return Collection
     */
    public function getTask(Task $task)
    {
        return Task::find($task->id);
    }
}

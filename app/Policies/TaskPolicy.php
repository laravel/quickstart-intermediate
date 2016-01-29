<?php

namespace App\Policies;

use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete or edit the given task.
     *
     * @param  User  $user
     * @param  Task  $task
     * @return bool
     */
    public function checkTaskOwner(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }    
}

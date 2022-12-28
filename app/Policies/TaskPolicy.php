<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use App\Models\Task;

class TaskPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Task $task)
    {
       return $user->id === $task->user_id ? Response::allow() : Response::deny();
    }

    public function delete(User $user, Task $task)
    {
       return $user->id === $task->user_id ? Response::allow() : Response::deny();
    }

    public function update(User $user, Task $task)
    {
       return $user->id === $task->user_id ? Response::allow() : Response::deny();
    }
}

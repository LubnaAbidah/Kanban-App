<?php

namespace App\Policies;
use App\Models\User;

class TaskPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update($user, $task)
    {
        return $user->id == $task->user_id;
    }

    public function delete($user, $task)
    {
        return $user->id == $task->user_id;
    }

    public function move($user, $task)
    {
        return $user->id == $task->user_id;
    }
    public function completed($user, $task)
    {
        return $user->id == $task->user_id;
    }
}

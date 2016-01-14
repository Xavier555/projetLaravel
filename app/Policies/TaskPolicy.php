<?php

namespace App\Policies;

use App\User;
use App\Task;

use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Détermine si l'utilisateur donné à un id correspondant à la tâche à supprimer.
     */

    public function destroy(User $user, Task $task)
    {
        return $user->id == $task->user_id;
    }
}

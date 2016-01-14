<?php

namespace App\Policies;

use App\User;
use App\Task;
use App\Listask;

use Illuminate\Auth\Access\HandlesAuthorization;

class ListaskPolicy
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

    public function destroy(User $user, Listask $listask)
    {
        //return $user->id == $task->user_id;
        return true;
    }
}

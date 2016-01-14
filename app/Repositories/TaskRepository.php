<?php

namespace App\Repositories;

use App\User;
use App\Task;
use App\Listask;

class TaskRepository
{
    /**
     * Retour toutes les tâches pour l'utilisateur donné.
     */

    public function forUser(User $user)
    {
        return Task::where('user_id', $user->id)->orderBy("created_at", 'asc')->get();
    }


    public function updatetask(Task $task, $name, $description)
    {
        Task::updateOrCreate(['id' => $task->id], ['name' => $name, 'description' => $description]);
    }
}
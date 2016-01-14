<?php
/**
 * Created by PhpStorm.
 * User: The-Nexus
 * Date: 13/01/2016
 * Time: 09:50
 */

namespace App\Repositories;

use App\User;
use App\Task;
use App\Listask;


class ListaskRepository
{
    public function forUserTest(User $user)
    {
        return Listask::where('id', $user->id)->orderBy("created_at", 'asc')->get();
    }

    public function forUser(Task $task)
    {
        return Listask::where('task_id', $task->id)->orderBy("created_at", 'asc')->get();
    }

    public function setValidate(Listask $listask)
    {
        Listask::updateOrCreate(['id' => $listask->id], ['validation' => true]);
    }

    public function updateListask(Listask $listask, $name, $echeance)
    {
        Listask::updateOrCreate(['id' => $listask->id], ['name' => $name, 'echeance' => $echeance]);
    }

}
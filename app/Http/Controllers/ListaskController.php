<?php

namespace App\Http\Controllers;

use App\Task;
use App\Listask;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ListaskRepository;

use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class ListaskController extends Controller
{

    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    // la tache courante


    public function __construct(ListaskRepository $tasks)
    {
        $this->tasks = $tasks;
    }


    public function indexList(Request $request, Task $task)
    {
        //dd($task);
        /*
        Auth::logout();
        dd(Auth::check());
        //*/
        //dd(Auth::check());



        /*
        try {
            $request->user()->name;
        }
        catch(Exception $e){}
        //*/

        //*********************************************
        // Test réussi
        //*********************************************
        //dd($this->tasks->forUser($request->user()));


        /*
        return view('tasks.indexListask', [
            'tasks' => $this->tasks->forUserTest($request->user()),
        ]);
        //*/

        //*
        return view('tasks.indexListask', [
            'tasks' => $this->tasks->forUser($task),
            'currentTask' => $task,
        ]);
        //*/

    }


    public function store(Request $request, Task $listask)
    {
        //dd($listask);
        //dd($task);
        //dd("youpie");
        // Méthode de logout certifié :p
        /*
        Auth::logout();
        return redirect('/tasks');
        //*/
        //*
        $this->validate($request, [
            'task' => 'required|max:30',
            'deadline' =>'required',
        ]);


        $listask->listasks()->create([
            'name' => $request->task,
            'echeance' => $request->deadline,
        ]);


        return redirect("listasks/$listask->id");
        //*/
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */

    public function destroy(Request $request, Listask $listask)
    {
        $this->authorize('destroy', $listask);

        $listask->delete();

        $chaine = $listask->task->id;
        return redirect("listasks/$chaine");

    }

    // Validation = true
    public function updateValidation(Request $request, Listask $listask)
    {
        $this->tasks->setValidate($listask);

        $chaine = $listask->task->id;
        return redirect("listasks/$chaine");

    }

    public function getUpdateListask(Request $request, Listask $listask)
    {

        return view('tasks.updateListask', [
            'currentListask' => $listask,
        ]);
    }

    public function setUpdateListask(Request $request, Listask $listask)
    {

        //*
        $this->validate($request, [
            'task' => 'required|max:255',
            'deadline' => 'required',
        ]);
        //*/

        $this->tasks->updateListask($listask, $request->task, $request->deadline);

        $chaine = $listask->task->id;
        return redirect("listasks/$chaine");
    }
}

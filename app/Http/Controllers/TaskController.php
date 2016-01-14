<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
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


        //*
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
        //*/

    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Méthode de logout certifié :p
        /*
        Auth::logout();
        return redirect('/tasks');
        //*/
        //*
        $this->validate($request, [
            'name' => 'required|max:20',
            'description' => 'required|max:30'
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/tasks');
        //*/
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $associateListask = $task->listasks;
        foreach($associateListask as $listask)
        {
            $listask->delete();
        }


        $task->delete();

        return redirect('/tasks');
    }

    public function getUpdateListask(Request $request, Task $task)
    {

        return view('tasks.updateTask', [
            'currenttask' => $task,
        ]);
    }

    public function setUpdateListask(Request $request, Task $task)
    {

        //*
        $this->validate($request, [
            'name' => 'required|max:20',
            'description' => 'required|max:30'
        ]);
        //*/

        $this->tasks->updateTask($task, $request->name, $request->description);

        return redirect("tasks");
    }

    public function getAbout()
    {
        return view('about');
    }



}

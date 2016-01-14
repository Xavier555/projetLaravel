@extends('layouts.app')
@extends('layouts.menu')

@section('logout')
    <li><a href="{{action('AuthenticationController@endOfSession')}}">Logout</a></li>
@endsection


@section('content')


    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')


        <form action="../listask/{{$currentTask->id}}" method="POST" class="form-horizontal">
            {{csrf_field()}}

                    <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="task" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="task-deadline" class="col-sm-3 control-label">DeadLine</label>

                <div class="col-sm-2">
                    <input type="date" name="deadline" id="task-deadline" class="form-control">
                </div>
            </div>



            <!-- Ajout d'un bouton tâche -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Task
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->

                    <thead>
                    <th> Name </th>
                    <th> DeadLine </th>
                    <th> Completed tasks </th>
                    <th> Validate </th>
                    <th> Modify </th>
                    <th> Delete </th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ $task->echeance }}</div>
                            </td>

                            <td class="table-text">
                                @if($task->validation == 1)
                                    <div>{{'Tâche_accomplie'}}</div>
                                @else
                                    <div>{{'Tâche_non_accomplie'}}</div>
                                @endif
                            </td>


                            <td>
                                <form action="../validate/{{ $task->id }}" method="POST">
                                    {{csrf_field()}}

                                    <button>Validate Task</button>
                                </form>
                            </td>

                            <td>
                                <form action="../getModify/{{ $task->id }}" method="POST">
                                    {{csrf_field()}}

                                    <button>Modify Task</button>
                                </form>
                            </td>

                            <td>
                                <form action="../list/{{ $task->id }}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                                    <button>Delete Task</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
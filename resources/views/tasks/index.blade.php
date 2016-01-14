@extends('layouts.app')
@extends('layouts.menu')

@section('logout')
    <li><a href="{{action('AuthenticationController@endOfSession')}}">Logout</a></li>
@endsection

@section('content')



    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')




        <form action="task" method="POST" class="form-horizontal">
            {{csrf_field()}}

                    <!-- Task Name -->
            <div class="form-group">

                <label for="task-description" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>

            </div>

            <!-- Task Description -->
            <div class="form-group">

                <label for="task-description" class="col-sm-3 control-label">Description</label>

                <div class="col-sm-6">
                    <input type="text" name="description" id="task-description" class="form-control">
                </div>

            </div>

            <!-- Ajout d'un bouton tâche -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task List
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
                        <th> Task </th>
                        <th> Description </th>
                        <th> Modify </th>
                        <th> Delete </th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>

                                <td>
                                    <form action="listasks/{{ $task->id }}" method="POST">
                                        {{csrf_field()}}

                                        <button>{{ $task->name }}</button>
                                    </form>
                                </td>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task-> description}}</div>
                                </td>

                                <td>
                                    <form action="getModifyTask/{{ $task->id }}" method="POST">
                                        {{csrf_field()}}

                                        <button>Modify Task</button>
                                    </form>
                                </td>

                                <td>
                                    <form action="task/{{ $task->id }}" method="POST">
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
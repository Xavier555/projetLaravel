@extends('layouts.app')
@extends('layouts.menu')


@section('logout')
    <li><a href="{{action('AuthenticationController@endOfSession')}}">Logout</a></li>
@endsection


@section('content')


    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <form action="../setModify/{{$currentListask->id}}" method="POST" class="form-horizontal">
            {{csrf_field()}}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="task" id="task-name" class="form-control" value={{$currentListask->name}}>
                </div>
            </div>

            <div class="form-group">
                <label for="task-deadline" class="col-sm-3 control-label">DeadLine</label>

                <div class="col-sm-2">
                    <input type="date" name="deadline" value={{ $currentListask->echeance }}>
                </div>
            </div>

            <!-- Ajout d'un bouton tâche -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update Task
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
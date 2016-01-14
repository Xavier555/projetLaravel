@extends('layouts.app')
@extends('layouts.menu')


@section('logout')
    <li><a href="{{action('AuthenticationController@endOfSession')}}">Logout</a></li>
@endsection


@section('content')


    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <form action="../setModifyTask/{{$currenttask->id}}" method="POST" class="form-horizontal">
            {{csrf_field()}}

                    <!-- Task Name -->
            <div class="form-group">

                <label for="task-description" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" value={{ $currenttask->name }}>
                </div>

            </div>

            <!-- Task Description -->
            <div class="form-group">

                <label for="task-description" class="col-sm-3 control-label">Description</label>

                <div class="col-sm-6">
                    <input type="text" name="description" id="task-description" class="form-control" value={{ $currenttask->description }}>
                </div>

            </div>

            <!-- Ajout d'un bouton tâche -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update Task List
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
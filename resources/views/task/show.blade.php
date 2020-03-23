@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header text-uppercase text-dark"><b>Task Details</b>
                        <a href="{{route('task.create')}}" class="btn-sm btn-info float-right">Create New Task</a>
                    </div>

                    <div class="card-body m-0 p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="p-5">
                            <h4 class="card-title">Title : {{$task->title}}</h4>
                            <p class="card-text">Detail: {{$task->description}}</p>

                            <p>Remarks: {{$task->remarks}}</p>

                            <ul class="list-group list-group-horizontal-sm">
                                <li class="list-group-item text-success">Status: {{$task->status}}</li>
                                <li class="list-group-item text-dark">Folder: {{$task->category->name}}</li>
                                <li class="list-group-item text-info">Created at: {{ date('d-M-y', strtotime($task->created_at))}}</li>
                            </ul>
                            <a href="{{route('task.index')}}" class="btn btn-dark float-left mt-1">All Tasks</a>
                            <a href="{{route('task.edit',$task->id)}}" class="btn btn-warning float-right mt-1">Update</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

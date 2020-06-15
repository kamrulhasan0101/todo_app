@extends('home')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-uppercase text-dark">Tasks List
                        <a href="{{route('task.create')}}" class="btn-sm btn-info float-right">Create New Task</a>
                    </div>

                    <div class="card-body m-0 p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="todo-tab" data-toggle="tab" href="#todo" role="tab" aria-controls="todo" aria-selected="false">Todo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="doing-tab" data-toggle="tab" href="#doing" role="tab" aria-controls="doing" aria-selected="false">Doing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="done-tab" data-toggle="tab" href="#done" role="tab" aria-controls="done" aria-selected="false">Done</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="cancel-tab" data-toggle="tab" href="#cancel" role="tab" aria-controls="cancel" aria-selected="false">Cancel</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <table class="table">
                                        @include('task.include.tableHead')
                                        <tbody>
                                        @foreach($tasks as $task)
                                            @include('task.include.tableBody')
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="todo" role="tabpanel" aria-labelledby="todo-tab">
                                    <table class="table">
                                        @include('task.include.tableHead')
                                        <tbody>
                                        @foreach($tasks->where('status',"todo") as $task)
                                            @include('task.include.tableBody')
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="doing" role="tabpanel" aria-labelledby="doing-tab">
                                    <table class="table">
                                        @include('task.include.tableHead')
                                        <tbody>
                                        @foreach($tasks->where('status',"doing") as $task)
                                            @include('task.include.tableBody')
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="done-tab">
                                    <table class="table">
                                        @include('task.include.tableHead')
                                        <tbody>
                                        @foreach($tasks->where('status',"done") as $task)
                                            @include('task.include.tableBody')
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="cancel-tab">
                                    <table class="table">
                                        @include('task.include.tableHead')
                                        <tbody>
                                        @foreach($tasks->where('status',"cancel") as $task)
                                            @include('task.include.tableBody')
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                    </div>
                </div>
<div class="text-center"><a href="{{route('category.index')}}" class="btn btn-primary mt-1"> Go To Task Folder</a></div>

            </div>
        </div>
    </div>
@endsection

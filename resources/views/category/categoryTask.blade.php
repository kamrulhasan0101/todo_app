@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-uppercase text-dark">{{$tasks['0']->category->name ?? "Opps!!! No Task To Show"}}
                        <a href="{{route('task.create')}}" class="btn-sm btn-info float-right">Create New Task</a>
                    </div>

                    <div class="card-body m-0 p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="w5" >#</th>
                                <th scope="col" class="notw500">Title</th>
                                <th scope="col" class="w100">Status</th>
                                <th scope="col" class="w100">Created_at</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @foreach($tasks as $task)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td><a href="{{route('task.show',$task->id)}}" class="text-dark">{{$task->title}}</a></td>
                                    <td>{{$task->status}}</td>
                                    <td>{{ date('d-M-y', strtotime($task->created_at))}}</td>
                                    <td class="text-center">

                                        <a href="" class="float-left btn-sm btn-success ml-md-3">Done</a>
                                        <a href="{{route('task.edit',$task->id)}}" class="float-left btn-sm btn-warning ml-2">Edit</a>
                                        <form method="POST" action="{{route('task.destroy',$task->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-sm btn-danger border-0 float-left ml-2" onclick= "return confirm('Are You Sure to Delete?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <div>
                    <a href="{{route('category.index')}}" class="btn btn-dark float-left m-1">Back To Task Folders</a>
                    <a href="{{route('task.index')}}" class="btn btn-secondary float-right m-1">Go To All Tasks</a>
                </div>
            </div>
        </div>
    </div>
@endsection

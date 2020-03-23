@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase text-dark">Task Folder
                        <a href="{{route('category.create')}}" class="btn-sm btn-secondary float-right">Create New Folder</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="list-group">
                            @foreach($categories as $category)
                                <a href="{{route('category.task',$category->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 text-dark">{{$category->name}}
                                            @if($category->tasks->count()==0)
                                            <span class="badge badge-pill badge-success">{{$category->tasks->count()}}</span>
                                            @else
                                            <span class="badge badge-pill badge-warning">{{$category->tasks->count()}}</span>
                                            @endif
                                        </h5>
                                        <small class="text-primary">Created {{\Carbon\Carbon::now()->diffInDays($category->created_at)}} days ago</small>
                                    </div>
                                    <small class="mb-2">
                                        <a href="{{route('category.task',$category->id)}}" class="float-left text-info">View Tasks</a>
                                        <a href="{{route('category.edit',$category->id)}}" class="float-left pl-3 text-success">Update Folder</a>

                                        <form method="POST" action="{{route('category.destroy',$category->id)}}">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="float-left pl-3 text-danger border-0 bg-white"
                                                onclick= "return confirm('Are You Sure to Delete?Folder and its all task will deleted.')">Delete Folder</button>
                                        </form>
                                    </small>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="text-center"><a href="{{route('task.index')}}" class="btn btn-primary mt-1"> Go To All Task</a></div>
            </div>
        </div>
    </div>
@endsection

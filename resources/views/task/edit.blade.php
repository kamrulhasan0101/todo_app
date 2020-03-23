@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase text-dark">Update Task</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <form method="POST" action="{{route('task.update',$task->id)}}">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="name" value="{{$task->title}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="description" class="form-control" id="Description" rows="3" required>{{$task->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="status" name="status" style="color: #5FBEAA;">
                                        <option value="{{$task->status}}">{{$task->status}}</option>
                                        <option value="todo">todo</option>
                                        <option value="doing">doing</option>
                                        <option value="done">done</option>
                                        <option value="cancel">cancel</option>
                                    </select>
                                </div>
                            </div>
                              <div class="form-group row">
                                <label for="deadline" class="col-sm-2 col-form-label">Deadline at</label>
                                  <label for="deadline" class="col-sm-3 col-form-label">{{ date('d-M-y h:i A', strtotime($task->deadline_at))}}</label>
                                  <label for="deadline" class="col-sm-2 col-form-label text-right">Change</label>
                                <div class="col-sm-5">
                                    <input type="date" name="deadline_at" class="form-control" id="deadline" value="{{$task->deadline_at}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Folder" class="col-sm-2 col-form-label">Folder</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="Folder" name="category_id">
                                        <option value="{{$task->category_id}}">{{$task->category->name}}</option>
                                        @foreach(Auth::user()->categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Remarks" class="col-sm-2 col-form-label">Remarks</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="remarks" class="form-control" id="Description">{{$task->remarks}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right ml-2">Update</button>
                            <a href="{{route('task.show',$task->id)}}" class="btn btn-danger float-right ml-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase text-dark">Create New Task</div>

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
                        <form method="POST" action="{{route('task.store')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="description" class="form-control" id="Description" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="status" name="status">
                                        <option value="todo">todo</option>
                                        <option value="doing">doing</option>
                                        <option value="done">done</option>
                                        <option value="cancel">cancel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deadline" class="col-sm-2 col-form-label">Deadline at</label>
                                <div class="col-sm-10">
                                    <input type="date" name="deadline_at" class="form-control" id="deadline" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Folder" class="col-sm-2 col-form-label">Folder</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="Folder" name="category_id">
                                        <option>Select Folder</option>
                                        @foreach(Auth::user()->categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Remarks" class="col-sm-2 col-form-label">Remarks</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="remarks" class="form-control" id="Description"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right ml-2">Save</button>
                            <button type="reset" class="btn btn-danger float-right ml-2">Reset</button>
                        </form>
                            <a href="{{route('task.index')}}" class="btn btn-outline-primary float-left">Back To Tasks list</a>
                            <a href="{{route('category.index')}}" class="btn btn-outline-secondary float-left ml-1">Back To Task Folder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

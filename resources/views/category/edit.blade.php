@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase text-dark">Create Category</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{route('category.update',$category->id)}}">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right ml-2">Update</button>
                            <a href="{{route('category.show',$category->id)}}" class="btn btn-danger float-right ml-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

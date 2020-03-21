@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase text-dark">Categories</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="list-group">
                                <a href="{{route('category.edit',$category->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 text-dark">{{$category->name}}</h5>
                                        <small class="text-primary">Created {{\Carbon\Carbon::now()->diffInDays($category->created_at)}} days ago</small>
                                    </div>
                                    <small class="mb-2">
                                       <a href="{{route('category.edit',$category->id)}}" class="float-left pl-3 text-success">Click for Update</a>

                                        <form method="POST" action="{{route('category.destroy',$category->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="float-left pl-3 text-danger border-0 bg-white"
                                                    onclick= "return confirm('Are You Sure to Delete?')">Click for Delete</button>
                                        </form>
                                    </small>
                                </a>

                        </div>
                       <a href="{{route('category.index')}}" class="btn btn-secondary mt-1" role="button" aria-pressed="true">Go Back</a>
                            <a href="{{route('category.create')}}" class="btn btn-secondary mt-1 float-right" role="button" aria-pressed="true">Add New One</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

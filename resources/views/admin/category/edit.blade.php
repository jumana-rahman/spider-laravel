@extends('layouts.starlight')

@section('category')
active
@endsection

@section('title')
Edit Category
@endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/home')}}">Dashboard</a>
        <a class="breadcrumb-item" href="{{url('/category')}}">Category</a>
        <a class="breadcrumb-item" href="">Edit Category</a>
    </nav>

    <div class="sl-pagebody">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Category</h3>
                            </div>
                            @if(session('update'))
                                <div class="alert alert-success">{{session('update')}}</div>
                            @endif
                            <div class="card-body">
                                <form action="{{url('/category/update')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="form-label">Category Name</label>
                                        <input type="hidden" name="category_id" value="{{$edit_category->id}}">
                                        <input type="text" class="form-control" name="category_name" value="{{$edit_category->category_name}}">
                                        @error('category_name')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror

                                    </div>
                                    <div class="form-group mt-2 text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
@endsection
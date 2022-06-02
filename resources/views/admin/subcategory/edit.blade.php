@extends('layouts.starlight')

@section('subcategory')
active
@endsection

@section('title')
Edit Subcategory
@endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/home')}}">Dashboard</a>
        <a class="breadcrumb-item" href="{{url('/subcategory')}}">Subcategory</a>
        <a class="breadcrumb-item" href="">Edit Subcategory</a>
    </nav>

    <div class="sl-pagebody">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Subcategory</h3>
                            </div>
                            @if(session('update'))
                                <div class="alert alert-success">{{session('update')}}</div>
                            @endif
                            <div class="card-body">
                                <form action="{{url('/subcategory/insert')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <select name="category_id" class="form-control">
                                            <option value="">---- Select Category ----</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{($category->id == $subcategories->category_id)?'selected':''}}>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="" class="form-label">Subcategory Name</label>
                                        <input type="text" name="subcategory_name" class="form-control" value="{{$subcategories->subcategory_name}}">
                                        @error('subcategory_name')
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
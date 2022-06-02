@extends('layouts.starlight')

@section('color_size')
active
@endsection

@section('title')
Color and Size
@endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/home')}}">Dashboard</a>
        <a class="breadcrumb-item" href="{{url('/subcategory')}}">Subcategory</a>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Colors List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>SL</th>
                                <th>Color Name</th>
                                <th>Color</th>
                                <th>Created at</th>
                            </tr>

                            @foreach($colors as $key=>$color)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$color->color_name}}</td>
                                <td>
                                    <i style="width:20px; height:20px; background:{{$color->color_code}}; display:inline-block; border-radius:50%;"></i>
                                </td>
                                <td>{{$color->created_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Size List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>SL</th>
                                <th>Size Name</th>
                                <th>Created at</th>
                            </tr>

                            @foreach($sizes as $key=>$size)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$size->size_name}}</td>
                                <td>{{$size->created_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Color</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('color/insert')}}" method="POST">
                            @csrf

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif

                            <div class="mt-2">
                                <label class="form-label">Color Name</label>
                                <input type="text" name="color_name" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Color Code</label>
                                <input type="text" name="color_code" class="form-control">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Add Color</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Add Size</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('size/insert')}}" method="POST">
                            @csrf

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif

                            <div class="mt-2">
                                <label class="form-label">Size Name</label>
                                <input type="text" name="size_name" class="form-control">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Add Size</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
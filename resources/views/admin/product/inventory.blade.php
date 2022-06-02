@extends('layouts.starlight')

@section('title')
Inventory
@endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/home')}}">Dashboard</a>
        <a class="breadcrumb-item" href="{{url('/subcategory')}}">Subcategory</a>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-8"></div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Inventory</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/inventory/insert')}}" method="POST">
                            @csrf

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif

                            <div class="mt-2">
                                <label class="form-label">Product Name</label>
                                <input type="text" readonly name="product_name" value="{{$product_info->product_name}}" class="form-control">
                                <input type="hidden" name="product_id" value="{{$product_info->id}}" class="form-control">
                            </div>
                            <div class="mt-2">
                                <select name="color_id" class="form-control">
                                    <option value="">-- Select Color --</option>
                                    @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->color_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <select name="size_id" class="form-control">
                                    <option value="">-- Select Size --</option>
                                    @foreach($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->size_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Product Quantity</label>
                                <input type="text" name="quantity" class="form-control">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Add Inventory</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
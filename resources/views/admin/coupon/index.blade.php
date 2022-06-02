@extends('layouts.starlight')

@section('coupon')
active
@endsection

@section('title')
Coupon
@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/home')}}">Dashboard</a>
        <a class="breadcrumb-item" href="{{url('/coupon')}}">Coupon</a>
    </nav>

    <div class="sl-pagebody">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>Coupons</h3>
                            </div>
                            @if(session('delete'))
                                <div class="alert alert-success">{{session('delete')}}</div>
                            @endif
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>SL</th>
                                        <th>Coupon Name</th>
                                        <th>Validity</th>
                                        <th>Discount %</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach($coupons as $coupon)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$coupon->coupon_name}}</td>
                                            <td>{{$coupon->validity}}</td>
                                            <td>{{$coupon->discount}}</td>
                                            <td>{{$coupon->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{url('/category/edit')}}/{{$coupon->id}}" class="btn btn-primary">Edit</a>
                                                <a href="{{url('/category/delete')}}/{{$coupon->id}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Add Coupon</h3>
                            </div>
                            @if(session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                            <div class="card-body">
                                <form action="{{url('/coupon/insert')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="form-label">Coupon Name</label>
                                        <input type="text" class="form-control" name="coupon_name">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="" class="form-label">Coupon Validity</label>
                                        <input type="date" class="form-control" name="validity">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="" class="form-label">Coupon Discount %</label>
                                        <input type="number" class="form-control" name="discount">
                                    </div>
                                    <div class="form-group mt-2 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
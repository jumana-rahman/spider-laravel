@extends('frontend.master')

@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Account</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Account</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- account area start -->
<div class="account-dashboard pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>
                        <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Orders</a></li>
                        <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Account details</a>
                        </li>
                        <li><a href="{{route('customer_logout')}}" class="nav-link">Sign Out</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                    <div class="tab-pane fade show active" id="dashboard">
                        <h4>Dashboard </h4>
                        <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent
                                orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a
                                href="#">Edit your password and account details.</a></p>
                    </div>
                    <div class="tab-pane fade" id="orders">
                        <h4>Orders</h4>
                        <div class="table_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key=>$order)   
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>BDT {{$order->total}}</td>
                                        <td><a href="{{route('invoice.download', $order->id)}}" class="view">Download Invoice</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-details">
                        <h3>Account details </h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="{{url('/profile/Update')}}" method="POST">
                                        @csrf
                                        <div class="default-form-box mb-20">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{Auth::guard('customerlogin')->user()->name}}">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{Auth::guard('customerlogin')->user()->email}}">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Password</label>
                                            <input type="password" name="password">
                                        </div>
                                        <div class="save_button mt-3">
                                            <button class="btn" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- account area ends -->

@endsection
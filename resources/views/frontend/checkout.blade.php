@extends('frontend.master')

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Shop</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <form action="{{url('/order/insert')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Full Name</label>
                                        <input type="text" name="name" value="{{Auth::guard('customerlogin')->user()->name}}"/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{Auth::guard('customerlogin')->user()->email}}"/>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Company Name</label>
                                        <input type="text" name="company"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="billing-select mb-4">
                                        <label>Country</label>
                                        <select name="country_id" id="country">
                                            <option>Select Your country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="billing-select mb-4">
                                        <label>City</label>
                                        <select name="city_id" id="city">
                                            <option>Select Your City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Street Address</label>
                                        <input class="billing-address" name="address" placeholder="House number and street name"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Postcode / ZIP</label>
                                        <input type="number" name="postcode"/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Phone</label>
                                        <input type="text" name="phone"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="additional-info-wrap">
                                <h4>Additional information</h4>
                                <div class="additional-info">
                                    <label>Order notes</label>
                                    <textarea placeholder="Notes about your order, e.g. special notes for delivery. "
                                        name="notes"></textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">
                                    <div class="your-order-top">
                                        <ul>
                                            <li>Product</li>
                                            <li>Total</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($carts as $cart)  
                                                <li>
                                                    <span class="order-middle-left">{{$cart->rel_to_product->product_name}} X {{$cart->quantity}}</span> 
                                                    <span class="order-price">BDT {{$cart->rel_to_product->discount_price*$cart->quantity}} </span>
                                                </li>
                                                @php
                                                    $total += $cart->rel_to_product->discount_price*$cart->quantity;
                                                @endphp
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            <li>
                                                <span class="order-middle-left">Discount</span>
                                                @php
                                                    $discount = session('discount');
                                                @endphp
                                                <span class="order-price">BDT {{$discount}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-bottom">
                                        <h5>Delivery Location</h5>
                                        <input class="charge" style="width: 13px; height: 13px;" type="radio" name="delivery_charge" value="60"> Inside Dhaka (BDT 60)
                                        <br>
                                        <input class="charge" style="width: 13px; height: 13px;" type="radio" name="delivery_charge" value="120"> Outside Dhaka (BDT 120)
                                    </div>

                                    <input type="hidden" name="sub_total" value="{{$total}}">
                                    <input type="hidden" name="discount" value="{{$discount}}">

                                    <div class="your-order-total">
                                        <input type="hidden" id="total" value="{{$total - $discount}}">
                                        <ul>
                                            <li class="order-total">Total</li>
                                            <li id="grand_total">BDT {{$total - $discount}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion element-mrg">
                                        <h3>Select Payment Method</h3>
                                        <input style="width: 13px; height: 13px;" type="radio" name="payment_method" value="1"> Cash On Delivery
                                        <br>
                                        <input style="width: 13px; height: 13px;" type="radio" name="payment_method" value="2"> Pay with SSLCommerz
                                        <br>
                                        <input style="width: 13px; height: 13px;" type="radio" name="payment_method" value="3"> Pay with Stripe
                                    </div>
                                </div>
                            </div>
                            <div class="Place-order mt-25">
                                <button type="submit" class="btn-hover px-5">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout area end -->
@endsection

@section('footer_script')
    <script>
        $('#country').select2();
        $('#country').change(function(){
            var country_id = $(this).val();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'getCity',
                data:{'country_id':country_id},
                success:function(data){
                    $('#city').html(data);
                    $('#city').select2();
                }
            });
        })
    </script>

    <script>
        $('.charge').click(function(){
            var charge = $(this).val();
            var total = $('#total').val();
            var grand_total = parseInt(total)+parseInt(charge);
            $('#grand_total').html(grand_total);
        })
    </script>
@endsection
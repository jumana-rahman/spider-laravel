<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;

class CartController extends Controller
{
    function cart_insert(Request $request){

        if(Cart::where('user_id', Auth::guard('customerlogin')->id())->where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists()){
            Cart::where('user_id', Auth::guard('customerlogin')->id())->where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->increment('quantity', $request->qtybutton);
        }
        else{
            Cart::insert([
                'user_id'=>Auth::guard('customerlogin')->id(),
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->qtybutton,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('cart_added', 'Added to Cart!');
        }
    }

    function cart(Request $request){
        $coupon_code = $request->coupon_code;
        $message = null;

        if($coupon_code == ''){
            $discount = 0;
        }
        else{
            if(Coupon::where('coupon_name', $coupon_code)->exists()){
                if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon_code)->first()->validity){
                    $message = 'Expired Coupon';
                    $discount = 0;
                }
                else{
                    $discount = Coupon::where('coupon_name', $coupon_code)->first()->discount;
                }
            }
            else{
                $message = 'Invalid Coupon Code';
                $discount = 0;
            }
        }

        $carts = Cart::where('user_id', Auth::guard('customerlogin')->id())->get();
        return view('frontend.cart', [
            'carts'=>$carts,
            'discount'=>$discount,
            'message'=>$message,
        ]);
    }

    function cart_delete($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }

    function cart_update(Request $request){
        foreach($request->qtybutton as $cart_id=>$quantity){
            Cart::find($cart_id)->update([
                'quantity' => $quantity,
            ]);
        }
        return back();
    }

    function clear_cart(){
        Cart::where('user_id', Auth::guard('customerlogin')->id())->delete();
        return back();
    }
}

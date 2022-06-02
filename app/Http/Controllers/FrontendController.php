<?php

namespace App\Http\Controllers;

use App\Models\BillingDetail;
use App\Models\Category;
use App\Models\CustomerLogin;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class FrontendController extends Controller
{
    function welcome(){
        $all_categories = Category::all();
        $all_products = Product::all();
        $new_products = Product::latest()->take(6)->get();
        $top_categories = Category::take(3)->get();
        return view('frontend.index', [
            'all_categories'=>$all_categories,
            'all_products'=>$all_products,
            'top_categories'=>$top_categories,
            'new_products'=>$new_products,
        ]);
    }

    function product_details($product_id){
        $product_info = Product::find($product_id);
        $related_products = Product::where('category_id', $product_info->category_id)->where('id', '!=', $product_id)->get();
        $available_colors = Inventory::where('product_id', $product_id)->groupBy('color_id')->selectRaw('count(*) as total, color_id')->get(); 

        $review = OrderProduct::where('product_id', $product_id)->whereNotNull('review')->get();
        return view('frontend.product_details', [
            'product_info'=>$product_info,
            'available_colors'=>$available_colors,
            'related_products'=>$related_products,
            'review'=>$review,
        ]);
    }

    function profile(){
        $orders = Order::where('user_id', Auth::guard('customerlogin')->id())->get();
        return view('frontend.profile', [
            'orders'=>$orders,
        ]);
    }

    function profile_update(Request $request){
        if(empty($request->password)){
            CustomerLogin::find(Auth::guard('customerlogin')->id())->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            return back();
        }
        else{
            CustomerLogin::find(Auth::guard('customerlogin')->id())->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
            ]);
            return back();
        }
    }

    function invoice_download($invoice_id){
        $billing_details = BillingDetail::find($invoice_id);
        $orders = Order::find($invoice_id);
        $products = OrderProduct::where('order_id', $invoice_id)->get();
        $data = [
            'billing_details'=>$billing_details,
            'orders'=>$orders,
            'products'=>$products,
        ];
        $pdf = PDF::loadView('invoice.invoice',compact('billing_details', 'orders', 'products'));
        return $pdf->download('jesco.pdf');
        //  return view('invoice.invoice',compact('billing_details', 'orders', 'products'));
    }

    function getSize(Request $request){
        $sizes = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get('size_id');

        $size_name_to_send = '';
        foreach($sizes as $size){
            $size_name = Size::find($size->size_id)->size_name;
            $size_name_to_send .= '<li><a name="'.$size->size_id.'" class="gray size_id">'.$size_name.'</a></li>';
        }
        echo $size_name_to_send;
    }

    function review_insert(Request $request){
        OrderProduct::where('user_id', Auth::guard('customerlogin')->id())->where('product_id', $request->product_id)->update([
            'review'=>$request->review,
            'star'=>$request->star,
        ]);
        return back();
    }
}

<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PassResetController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [FrontendController::class, 'welcome']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/product_details/{product_id}', [FrontendController::class, 'product_details'])->name('product.details');
Route::post('/getSize', [FrontendController::class, 'getSize']);

// Edit Profile
Route::get('/profile/edit', [ProfileController::class, 'profile']);
Route::post('/profile/update', [ProfileController::class, 'update']);
Route::post('/password/update', [ProfileController::class, 'password_update']);
Route::post('/photo/change', [ProfileController::class, 'photochange']);

// Category
Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::post('/category/insert', [CategoryController::class, 'insert']);
Route::get('/category/delete/{category_id}', [CategoryController::class, 'delete']);
Route::get('/category/edit/{category_id}', [CategoryController::class, 'edit']);
Route::post('/category/update', [CategoryController::class, 'update']);

// Subcategory
Route::get('/subcategory', [SubcategoryController::class, 'index']);
Route::post('/subcategory/insert', [SubcategoryController::class, 'insert']);
Route::get('/subcategory/edit/{subcategory_id}', [SubcategoryController::class, 'edit']);
Route::get('/subcategory/delete/{subcategory_id}', [SubcategoryController::class, 'delete']);
Route::get('/subcategory/restore/{subcategory_id}', [SubcategoryController::class, 'restore']);
Route::get('/subcategory/permanent/delete/{subcategory_id}', [SubcategoryController::class, 'p_delete']);

// Products
Route::get('/add/product', [ProductController::class, 'index'])->name('add.product');
Route::post('/getSubcategory', [ProductController::class, 'getSubcategory']);
Route::post('/product/insert', [ProductController::class, 'insert'])->name('product.insert');

// Color and Size
Route::get('/color/size', [ProductController::class, 'color_size'])->name('color.size');
Route::post('/color/insert', [ProductController::class, 'color_insert']);
Route::post('/size/insert', [ProductController::class, 'size_insert']);

// Inventory
Route::get('/inventory/{product_id}', [ProductController::class, 'inventory'])->name('inventory');
Route::post('/inventory/insert', [ProductController::class, 'inventory_insert']);

// User
Route::post('/add/user', [HomeController::class, 'add_user']);

// Customer Login
Route::post('/customer/login', [CustomerLoginController::class, 'customer_login']);
Route::post('/customer/register', [CustomerRegisterController::class, 'customer_register']);
Route::get('/customer/logout', [CustomerLoginController::class, 'customer_logout'])->name('customer_logout');
Route::get('/profile', [FrontendController::class, 'profile'])->name('profile');
Route::post('/profile/Update', [FrontendController::class, 'profile_update']);

//Cart
Route::post('/cart/insert', [CartController::class, 'cart_insert']);
Route::get('/cart/delete/{cart_id}', [CartController::class, 'cart_delete'])->name('cart.delete');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/update', [CartController::class, 'cart_update']);
Route::get('/clear/cart', [CartController::class, 'clear_cart'])->name('clear.cart');

// Auth Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Coupon
Route::get('/coupon', [CouponController::class, 'coupon'])->name('coupon');
Route::post('/coupon/insert', [CouponController::class, 'coupon_insert']);

// Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/getCity', [CheckoutController::class, 'getCity']);
Route::post('/order/insert', [CheckoutController::class, 'order_insert']);
Route::get('/order/success', [CheckoutController::class, 'order_success'])->name('order.success');

// SSLCOMMERZ Start
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
// SSLCOMMERZ END

// Stripe
Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

// Invoice
Route::get('/invoice/download/{invoice_id}', [FrontendController::class, 'invoice_download'])->name('invoice.download');

// Login with Github
Route::get('/github/redirect', [GithubController::class, 'RedirectToProvider']);
Route::get('/github/callback', [GithubController::class, 'RedirectToWebsite']);

// Login with Google
Route::get('/google/redirect', [GoogleController::class, 'RedirectToProvider']);
Route::get('/google/callback', [GoogleController::class, 'RedirectToWebsite']);

// Login with Facebook
Route::get('/facebook/redirect', [FacebookController::class, 'RedirectToProvider']);
Route::get('/facebook/callback', [FacebookController::class, 'RedirectToWebsite']);

// Reset password
Route::get('/pass/reset', [PassResetController::class, 'pass_reset'])->name('pass.reset');
Route::post('/pass/reset/notification', [PassResetController::class, 'pass_reset_notification'])->name('pass.reset.notification');
Route::get('/pass/reset/form/{reset_token}', [PassResetController::class, 'pass_reset_form'])->name('pass.reset.form');
Route::post('/pass/reset/update', [PassResetController::class, 'pass_reset_update'])->name('pass.reset.update');

// Review
Route::post('/review/insert', [FrontendController::class, 'review_insert'])->name('review.insert');
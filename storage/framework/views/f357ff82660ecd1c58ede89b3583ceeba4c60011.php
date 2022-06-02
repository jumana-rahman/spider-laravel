

<?php $__env->startSection('content'); ?>
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

    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="<?php echo e(url('/cart/update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Until Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $total = 0;
                                    ?>

                                    <?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img class="img-responsive ml-15px"
                                                    src="<?php echo e(asset('/uploads/products/preview')); ?>/<?php echo e($cart->rel_to_product->product_image); ?>" alt="" /></a>
                                                </td>
                                            <td class="product-name"><a href="#"><?php echo e($cart->rel_to_product->product_name); ?></a></td>
                                            <td class="product-price-cart"><span class="amount">BDT <?php echo e($cart->rel_to_product->discount_price); ?></span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qtybutton[<?php echo e($cart->id); ?>]"
                                                    value="<?php echo e($cart->quantity); ?>" />
                                                </div>
                                            </td>
                                            <td class="product-subtotal">BDT <?php echo e($cart->rel_to_product->discount_price*$cart->quantity); ?></td>
                                            <td class="product-remove">
                                                <a href="<?php echo e(route('cart.delete', $cart->id)); ?>"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>

                                        <?php
                                            $total +=  $cart->rel_to_product->discount_price*$cart->quantity;
                                        ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="6"><h3 class="text-center" style="color: grey;">Your Cart is Empty</h3></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="<?php echo e(url('/')); ?>">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button type="submit">Update Shopping Cart</button>
                                        <a href="<?php echo e(route('clear.cart')); ?>">Clear Shopping Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-lm-30px">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                </div>
                                <?php if($message): ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php endif; ?>
                                <div class="discount-code">
                                    <p>Enter your coupon code if you have one.</p>
                                    
                                    <form action="<?php echo e(url('/cart')); ?>" method="GET">
                                        <input type="text" id="coupon_code" name="coupon_code" value="<?php echo e(@$_GET['coupon_code']); ?>"/>
                                        <button class="cart-btn-2" id="coupon_btn" type="submit">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 mt-md-30px">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>
                                <?php
                                    $after_discount = ($total*$discount)/100;
                                ?>
                                <h5>Total Amount <span>BDT <?php echo e($total); ?></span></h5>
                                <h5>Discount <span><?php echo e($discount); ?>%</span></h5>
                                <h5>Discount Amount<span>BDT <?php echo e(($total*$discount)/100); ?></span></h5>

                                <h4 class="grand-totall-title">Grand Total <span>BDT <?php echo e($total-$after_discount); ?></span></h4>
                                <?php
                                    session([
                                        'discount'=>($total*$discount)/100,
                                    ]);
                                ?>
                                <a href="<?php echo e(route('checkout')); ?>">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_script'); ?>
<script>
    $('#coupon_btn').click(function(){
        var coupon_code = $('#coupon_code').val();
        var current_link = '<?php echo e(url('/cart')); ?>';
        var link_to_go = current_link+'/'+coupon_code;
        window.location.href = link_to_go;
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/frontend/cart.blade.php ENDPATH**/ ?>


<?php $__env->startSection('product'); ?>
active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?php echo e(url('/home')); ?>">Dashboard</a>
        <a class="breadcrumb-item" href="<?php echo e(url('/subcategory')); ?>">Subcategory</a>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Product List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Discount %</th>
                                <th>Discount Price</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>

                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($product->product_name); ?></td>
                                <td><?php echo e($product->product_price); ?></td>
                                <td><?php echo e($product->discount); ?></td>
                                <td><?php echo e($product->discount_price); ?></td>
                                <td><?php echo e(substr($product->description, 0, 20).'....'); ?></td>
                                <td>
                                    <img width="50" src="<?php echo e(asset('uploads/products/preview')); ?>/<?php echo e($product->product_image); ?>" alt="">
                                </td>

                                <td>
                                    <a href="<?php echo e(route('inventory', $product->id)); ?>" class="btn btn-info">Inventory</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('/product/insert')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <?php if(session('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>
                            <div class="mt-2">
                                <select name="category_id" class="form-control select_category">
                                    <option value="">-- Select Category --</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mt-2">
                                <select name="subcategory_id" class="form-control subcategory">
                                    <option value="">-- Select Subcategory --</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="product_name" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Product Price</label>
                                <input type="text" name="product_price" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Discount %</label>
                                <input type="text" name="discount" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Description</label>
                                <textarea id="summernote" class="form-control" name="description" cols="30" rows="5"></textarea>
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="product_image">
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Product Thumbnails</label>
                                <input multiple type="file" class="form-control" name="product_thumb[]">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_script'); ?>
<script>
    $('.select_category').change(function(){
        var category_id = $(this).val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'/getSubcategory',
            data:{category_id:category_id},
            success:function(data){
                $('.subcategory').html(data);
            }
        })
    });

    // Select2
    $(document).ready(function() {
        $('.select_category').select2();
    });

    // Summernot
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.starlight', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/admin/product/index.blade.php ENDPATH**/ ?>
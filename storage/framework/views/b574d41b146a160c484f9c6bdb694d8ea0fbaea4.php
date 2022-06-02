

<?php $__env->startSection('title'); ?>
Inventory
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?php echo e(url('/home')); ?>">Dashboard</a>
        <a class="breadcrumb-item" href="<?php echo e(url('/subcategory')); ?>">Subcategory</a>
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
                        <form action="<?php echo e(url('/inventory/insert')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <?php if(session('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>

                            <div class="mt-2">
                                <label class="form-label">Product Name</label>
                                <input type="text" readonly name="product_name" value="<?php echo e($product_info->product_name); ?>" class="form-control">
                                <input type="hidden" name="product_id" value="<?php echo e($product_info->id); ?>" class="form-control">
                            </div>
                            <div class="mt-2">
                                <select name="color_id" class="form-control">
                                    <option value="">-- Select Color --</option>
                                    <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($color->id); ?>"><?php echo e($color->color_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mt-2">
                                <select name="size_id" class="form-control">
                                    <option value="">-- Select Size --</option>
                                    <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($size->id); ?>"><?php echo e($size->size_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.starlight', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/admin/product/inventory.blade.php ENDPATH**/ ?>
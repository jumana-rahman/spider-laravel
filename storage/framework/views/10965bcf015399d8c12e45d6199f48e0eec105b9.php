

<?php $__env->startSection('coupon'); ?>
active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Coupon
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?php echo e(url('/home')); ?>">Dashboard</a>
        <a class="breadcrumb-item" href="<?php echo e(url('/coupon')); ?>">Coupon</a>
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
                            <?php if(session('delete')): ?>
                                <div class="alert alert-success"><?php echo e(session('delete')); ?></div>
                            <?php endif; ?>
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

                                    <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->index+1); ?></td>
                                            <td><?php echo e($coupon->coupon_name); ?></td>
                                            <td><?php echo e($coupon->validity); ?></td>
                                            <td><?php echo e($coupon->discount); ?></td>
                                            <td><?php echo e($coupon->created_at->diffForHumans()); ?></td>
                                            <td>
                                                <a href="<?php echo e(url('/category/edit')); ?>/<?php echo e($coupon->id); ?>" class="btn btn-primary">Edit</a>
                                                <a href="<?php echo e(url('/category/delete')); ?>/<?php echo e($coupon->id); ?>" class="btn btn-danger">Delete</a>
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
                                <h3>Add Coupon</h3>
                            </div>
                            <?php if(session('success')): ?>
                                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                            <?php endif; ?>
                            <div class="card-body">
                                <form action="<?php echo e(url('/coupon/insert')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.starlight', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/admin/coupon/index.blade.php ENDPATH**/ ?>
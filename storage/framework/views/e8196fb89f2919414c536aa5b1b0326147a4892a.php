

<?php $__env->startSection('color_size'); ?>
active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Color and Size
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
                        <h3>Colors List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>SL</th>
                                <th>Color Name</th>
                                <th>Color</th>
                                <th>Created at</th>
                            </tr>

                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($color->color_name); ?></td>
                                <td>
                                    <i style="width:20px; height:20px; background:<?php echo e($color->color_code); ?>; display:inline-block; border-radius:50%;"></i>
                                </td>
                                <td><?php echo e($color->created_at->diffForHumans()); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Size List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>SL</th>
                                <th>Size Name</th>
                                <th>Created at</th>
                            </tr>

                            <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($size->size_name); ?></td>
                                <td><?php echo e($size->created_at->diffForHumans()); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Color</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('color/insert')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <?php if(session('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>

                            <div class="mt-2">
                                <label class="form-label">Color Name</label>
                                <input type="text" name="color_name" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Color Code</label>
                                <input type="text" name="color_code" class="form-control">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Add Color</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Add Size</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('size/insert')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <?php if(session('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>

                            <div class="mt-2">
                                <label class="form-label">Size Name</label>
                                <input type="text" name="size_name" class="form-control">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Add Size</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.starlight', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/admin/product/color_size.blade.php ENDPATH**/ ?>


<?php $__env->startSection('category'); ?>
active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Edit Category
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Category</h3>
                            </div>
                            <?php if(session('update')): ?>
                                <div class="alert alert-success"><?php echo e(session('update')); ?></div>
                            <?php endif; ?>
                            <div class="card-body">
                                <form action="<?php echo e(url('/category/update')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="" class="form-label">Category Name</label>
                                        <input type="hidden" name="category_id" value="<?php echo e($edit_category->id); ?>">
                                        <input type="text" class="form-control" name="category_name" value="<?php echo e($edit_category->category_name); ?>">
                                        <?php $__errorArgs = ['category_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                    <div class="form-group mt-2 text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.starlight', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>
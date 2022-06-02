

<?php $__env->startSection('category'); ?>
active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Category
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?php echo e(url('/home')); ?>">Dashboard</a>
        <a class="breadcrumb-item" href="<?php echo e(url('/category')); ?>">Category</a>
    </nav>

    <div class="sl-pagebody">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>Categories</h3>
                            </div>
                            <?php if(session('delete')): ?>
                                <div class="alert alert-success"><?php echo e(session('delete')); ?></div>
                            <?php endif; ?>
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Added By</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>

                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->index+1); ?></td>
                                            <td><?php echo e($category->category_name); ?></td>
                                            <td><?php echo e(App\Models\User::find($category->added_by)->name); ?></td>
                                            <td><?php echo e($category->created_at->diffForHumans()); ?></td>
                                            <td>
                                                <a href="<?php echo e(url('/category/edit')); ?>/<?php echo e($category->id); ?>" class="btn btn-primary">Edit</a>
                                                <a href="<?php echo e(url('/category/delete')); ?>/<?php echo e($category->id); ?>" class="btn btn-danger">Delete</a>
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
                                <h3>Add Category</h3>
                            </div>
                            <?php if(session('success')): ?>
                                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                            <?php endif; ?>
                            <div class="card-body">
                                <form action="<?php echo e(url('/category/insert')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" name="category_name">
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
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
<!-- ########## END: MAIN PANEL ########## -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.starlight', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/admin/category/index.blade.php ENDPATH**/ ?>
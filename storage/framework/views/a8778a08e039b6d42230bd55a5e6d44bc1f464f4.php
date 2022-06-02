

<?php $__env->startSection('subcategory'); ?>
active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Subcategory
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?php echo e(url('/home')); ?>">Dashboard</a>
        <a class="breadcrumb-item" href="<?php echo e(url('/subcategory')); ?>">Subcategory</a>
    </nav>

    <div class="sl-pagebody">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>Subcategories</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Subcategory Name</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>

                                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->index+1); ?></td>
                                            <td><?php echo e(App\Models\Category::find($subcategory->category_id)->category_name); ?></td>
                                            <td><?php echo e($subcategory->subcategory_name); ?></td>
                                            <td><?php echo e($subcategory->created_at->diffForHumans()); ?></td>
                                            <td>
                                                <a href="<?php echo e(url('/subcategory/edit')); ?>/<?php echo e($subcategory->id); ?>" class="btn btn-primary">Edit</a>

                                                <a href="<?php echo e(url('/subcategory/delete')); ?>/<?php echo e($subcategory->id); ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Trashed Subcategories</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Subcategory Name</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>

                                    <?php $__currentLoopData = $trashed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->index+1); ?></td>
                                            <td><?php echo e(App\Models\Category::find($subcategory->category_id)->category_name); ?></td>
                                            <td><?php echo e($subcategory->subcategory_name); ?></td>
                                            <td><?php echo e($subcategory->created_at->diffForHumans()); ?></td>
                                            <td>
                                                <a href="<?php echo e(url('/subcategory/restore')); ?>/<?php echo e($subcategory->id); ?>" class="btn btn-primary">Restore</a>

                                                <a href="<?php echo e(url('/subcategory/permanent/delete')); ?>/<?php echo e($subcategory->id); ?>" class="btn btn-danger">Delete</a>
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
                                <h3>Add Subcategory</h3>
                            </div>
                            <?php if(session('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>

                            <?php if(session('exist')): ?>
                                <div class="alert alert-warning">
                                    <?php echo e(session('exist')); ?>

                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <form action="<?php echo e(url('/subcategory/insert')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <select name="category_id" class="form-control">
                                            <option value="">---- Select Category ----</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['category_id'];
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
                                    <div class="form-group mt-2">
                                        <label for="" class="form-label">Subcategory Name</label>
                                        <input type="text" name="subcategory_name" class="form-control">
                                        <?php $__errorArgs = ['subcategory_name'];
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
                                        <button type="submit" class="btn btn-primary">Add Subcategory</button>
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
<?php echo $__env->make('layouts.starlight', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/admin/subcategory/index.blade.php ENDPATH**/ ?>
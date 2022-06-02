

<?php $__env->startSection('title'); ?>
Edit Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?php echo e(url('/home')); ?>">Dashboard</a>
        <a class="breadcrumb-item" href="">Edit Profile</a>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Name</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('/profile/update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mt-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Password</h3>
                    </div>
                    <?php if(session('old_pass')): ?>
                        <div class="alert alert-warning">
                            <?php echo e(session('old_pass')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('update_pass')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('update_pass')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="<?php echo e(url('/password/update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mt-2">
                                <label for="" class="form-label">Current Password</label>
                                <input type="password" name="old_password" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-warning"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Photo</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('/photo/change')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="mt-2">
                                <label for="" class="form-label">Profile Photo</label>
                                <input type="file" name="photo" class="form-control">
                                <?php $__errorArgs = ['photo'];
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
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.starlight', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/admin/profile/edit.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card my-5">
                    <div class="card-header text-center" style="background: linear-gradient(155deg,#fd3f6b 0,#fd7863 98%,#f3dfe0 100%);">
                        <h3 style="color: #fff;">RESET PASSWORD</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('pass.reset.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" value="<?php echo e($reset_token); ?>" name="reset_token">
                            <div class="mt-2">
                                <label for="" class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/pass_reset_form.blade.php ENDPATH**/ ?>
<?php $__env->startSection('home'); ?>
active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?php echo e(url('/home')); ?>">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h2>Welcome, <?php echo e($logged_user); ?> <span class="float-right">Total Users: <?php echo e($total_user); ?></span></h2></div>

                        <div class="card-body">
                            <?php if(session('status')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>SL No.</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Role</th>
                                    <th>Created at</th>
                                </tr>
                                <?php $__currentLoopData = $all_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($all_users->firstitem()+$key); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td>
                                        <?php
                                            if($user->role == 1){
                                                echo 'Admin';
                                            }
                                            else if($user->role == 2){
                                                echo 'Moderator';
                                            }
                                            else if($user->role == 3){
                                                echo 'Editor';
                                            }
                                            else if($user->role == 4){
                                                echo 'Shopkeeper';
                                            }
                                            else{
                                                echo 'Not Assigned';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo e(($user->created_at->diffInHours() > 24)?$user->created_at->format('d-m-y h:i:s A'):$user->created_at->diffForHumans()); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <?php echo e($all_users->links()); ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add User</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(url('/add/user')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group mt-2">
                                    <select name="role" class="form-control">
                                        <option value="">--- Select Role ---</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Moderator</option>
                                        <option value="3">Editor</option>
                                        <option value="4">Shopkeeper</option>
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary">Add User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.starlight', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/home.blade.php ENDPATH**/ ?>
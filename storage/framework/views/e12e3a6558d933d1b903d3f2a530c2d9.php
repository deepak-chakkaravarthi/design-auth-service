

<?php $__env->startSection('content'); ?>
    <h1>Assign Role to User: <?php echo e($user->username); ?></h1>
    <form action="<?php echo e(route('user.assign-role.store', $user->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="role">Select Role</label>
            <select id="role" class="form-control" name="role_id">
                <option value="1">Admin</option>
                <option value="2">User</option>
                <!-- Add more roles as per your application -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Assign Role</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DPK\secure-auth-system\secure-auth-system\resources\views/users/assign-role.blade.php ENDPATH**/ ?>
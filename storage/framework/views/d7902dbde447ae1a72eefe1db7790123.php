

<form action="<?php echo e(route('logout')); ?>" method="POST" id="logoutForm" style="display: inline;">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    
<?php $__env->startSection('content'); ?>
    <h1>All Users</h1>
    <table id="usersTable" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->username); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <button class="btn btn-primary" onclick="window.location.href='/user/<?php echo e($user->id); ?>'">View Details</button>
                        <button class="btn btn-warning" onclick="window.location.href='/assign-role/<?php echo e($user->id); ?>'">Add Role</button>
                        <button class="btn btn-danger" onclick="window.location.href='/remove-role/<?php echo e($user->id); ?>'">Remove Role</button>
                        <button class="btn btn-info" onclick="window.location.href='/update-user/<?php echo e($user->id); ?>'">Update User</button>

                        <!-- <button class="btn btn-warning" onclick="assignRole(<?php echo e($user->id); ?>)">Add Role</button> -->
                        <!-- <button class="btn btn-danger" onclick="removeRole(<?php echo e($user->id); ?>)">Remove Role</button> -->
                        <!-- <button class="btn btn-info" onclick="updateUser(<?php echo e($user->id); ?>)">Update User</button> -->
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DPK\secure-auth-system\secure-auth-system\resources\views/users/index.blade.php ENDPATH**/ ?>
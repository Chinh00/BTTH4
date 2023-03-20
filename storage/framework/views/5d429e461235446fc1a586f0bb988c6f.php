<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

        <h1 class="text-primary mt-3 mb-4 text-center"><b>Laravel 10 Crud Application</b></h1>

        <?php echo $__env->yieldContent('content'); ?>

    </div>

</body>
</html>

resources/views/index.blade.php


<?php $__env->startSection('content'); ?>

<?php if($message = Session::get('success')): ?>

<div class="alert alert-success">
    <?php echo e($message); ?>

</div>

<?php endif; ?>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Student Data</b></div>
            <div class="col col-md-6">
                <a href="<?php echo e(route('students.create')); ?>" class="btn btn-success btn-sm float-end">Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
            <?php if(count($data) > 0): ?>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><img src="<?php echo e(asset('images/' . $row->student_image)); ?>" width="75" /></td>
                        <td><?php echo e($row->student_name); ?></td>
                        <td><?php echo e($row->student_email); ?></td>
                        <td><?php echo e($row->student_gender); ?></td>
                        <td>
                            <form method="post" action="<?php echo e(route('students.destroy', $row->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <a href="<?php echo e(route('students.show', $row->id)); ?>" class="btn btn-primary btn-sm">View</a>
                                <a href="<?php echo e(route('students.edit', $row->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                            </form>

                        </td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            <?php endif; ?>
        </table>
        <?php echo $data->links(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Framework\Laravel\l_crud\resources\views/master.blade.php ENDPATH**/ ?>
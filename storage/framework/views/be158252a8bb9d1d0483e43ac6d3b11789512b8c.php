<?php $__env->startSection('title'); ?>
    <?php echo e(__("message.branches_list")); ?> | <?php echo e(__("message.Admin")); ?> <?php echo e(__("message.branches_list")); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0"><?php echo e(__("message.branches_list")); ?></h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><?php echo e(__("message.branches_list")); ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <p><a class="btn btn-primary" href="<?php echo e(route('branches.create')); ?>"><?php echo e(__("message.add_branch")); ?></a></p>
                                <?php echo $__env->make('admin.components._table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <?php echo $dataTable->scripts(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eslam/Documents/DoctorAppointments/resources/views/admin/branch/index.blade.php ENDPATH**/ ?>
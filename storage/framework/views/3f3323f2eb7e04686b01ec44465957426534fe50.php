<?php $__env->startSection('title'); ?>
    <?php echo e(__("message.areas_title")); ?> | <?php echo e(__("message.Admin")); ?> <?php echo e(__("message.areas_title")); ?>

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
                                <form action="<?php echo e(route('branches.store')); ?>" class="needs-validation" method="post"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('locations-filter', ['cityFieldName' => 'city_id','areaFieldName' => 'area_id','showAreas' => 'true','city_field_name' => 'city_id','area_field_name' => 'area_id','show_areas' => 'true'])->html();
} elseif ($_instance->childHasBeenRendered('u0vxGAE')) {
    $componentId = $_instance->getRenderedChildComponentId('u0vxGAE');
    $componentTag = $_instance->getRenderedChildComponentTagName('u0vxGAE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('u0vxGAE');
} else {
    $response = \Livewire\Livewire::mount('locations-filter', ['cityFieldName' => 'city_id','areaFieldName' => 'area_id','showAreas' => 'true','city_field_name' => 'city_id','area_field_name' => 'area_id','show_areas' => 'true']);
    $html = $response->html();
    $_instance->logRenderedChild('u0vxGAE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                    <?php $__errorArgs = ['location_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="row">

                                        <?php $__currentLoopData = \App\Enum\AvailableLocales::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                           for="name<?php echo e($locale->value); ?>"><?php echo e(__('message.name_'.$locale->value)); ?>

                                                        <?php if($loop->first): ?>
                                                            <span class="text text-danger">*</span>
                                                        <?php endif; ?>
                                                    </label>
                                                    <input type="text" id="name<?php echo e($locale->value); ?>" value="<?php echo e(old('name.'.$locale->value)); ?>" class="form-control"
                                                           placeholder="<?php echo e(__('message.name'.$locale->value)); ?>"
                                                           name="name[<?php echo e($locale->value); ?>]">
                                                </div>
                                                <?php $__errorArgs = ['name.'.$locale->value];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                       for="phone"><?php echo e(__('message.phone')); ?>

                                                    <span class="text text-danger">*</span>
                                                </label>
                                                <input type="text" id="phone" class="form-control"
                                                       placeholder="<?php echo e(__('message.phone')); ?>" value="<?php echo e(old('phone')); ?>"
                                                       name="phone">

                                            </div>
                                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                       for="phone"><?php echo e(__('message.url')); ?>

                                                </label>
                                                <input type="url" id="phone" class="form-control"
                                                       placeholder="<?php echo e(__('message.url')); ?>" value="<?php echo e(old('map_url')); ?>"
                                                       name="map_url">
                                            </div>
                                            <?php $__errorArgs = ['map_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="col-lg-8 col-md-8">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                       for="phone"><?php echo e(__('message.address')); ?>

                                                </label>
                                                <input type="text" id="phone" value="<?php echo e(old('address')); ?>" class="form-control"
                                                       placeholder="<?php echo e(__('message.address')); ?>"
                                                       name="address">
                                            </div>
                                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                 <div class="text-danger"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="status" type="checkbox" checked
                                                       id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    <?php echo app('translator')->get('message.Status'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="uil-save"></i> <?php echo app('translator')->get('message.save'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eslam/Documents/DoctorAppointments/resources/views/admin/branch/create.blade.php ENDPATH**/ ?>
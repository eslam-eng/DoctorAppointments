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
                            <h4 class="mb-0"><?php echo e(__("message.areas_edit")); ?></h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><?php echo e(__("message.areas_edit")); ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo e(route('areas.update',$area->id)); ?>" class="needs-validation"
                                      method="post"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('locations-filter', ['cityFieldName' => 'parent_id','selectedCountry' => ''.e($area->ancestors->first()->id).'','cities' => $cities,'selectedCity' => ''.e($area->ancestors->skip(1)->first()->id).'','city_field_name' => 'parent_id'])->html();
} elseif ($_instance->childHasBeenRendered('zmNkHTL')) {
    $componentId = $_instance->getRenderedChildComponentId('zmNkHTL');
    $componentTag = $_instance->getRenderedChildComponentTagName('zmNkHTL');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('zmNkHTL');
} else {
    $response = \Livewire\Livewire::mount('locations-filter', ['cityFieldName' => 'parent_id','selectedCountry' => ''.e($area->ancestors->first()->id).'','cities' => $cities,'selectedCity' => ''.e($area->ancestors->skip(1)->first()->id).'','city_field_name' => 'parent_id']);
    $html = $response->html();
    $_instance->logRenderedChild('zmNkHTL', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                    <div class="row">
                                        <?php $__currentLoopData = \App\Enum\AvailableLocales::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                           for="first-name-column"><?php echo e(__('pages.name_'.$locale->value)); ?>

                                                    </label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                           placeholder="<?php echo e(__('pages.name_'.$locale->value)); ?>"
                                                           value="<?php echo e($area->getTranslation('title',$locale->value)); ?>"
                                                           name="title[<?php echo e($locale->value); ?>]">
                                                </div>
                                                <?php $__errorArgs = ['title.'.$locale->value];
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
                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="status" type="checkbox"
                                                       <?php echo e($area->status ? 'checked' : ''); ?>  id="defaultCheck1">
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
    <script>
        document.addEventListener('livewire:load', function () {
            // Your jQuery code here
            $(document).ready(function () {

            });
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eslam/Documents/DoctorAppointments/resources/views/admin/locations/area/edit.blade.php ENDPATH**/ ?>
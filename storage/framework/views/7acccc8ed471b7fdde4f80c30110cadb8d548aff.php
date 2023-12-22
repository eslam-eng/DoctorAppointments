<div>
    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1"><?php echo app('translator')->get('message.select_country'); ?></label>
                <!-- Country Dropdown -->
                <select class="form-control" wire:model="selectedCountry"
                        name="<?php echo e($country_field_name); ?>">
                    <option value="0" disabled selected><?php echo app('translator')->get('message.select_country'); ?></option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <?php if(isset($cities) || $selectedCity): ?>
                <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo app('translator')->get('message.select_city'); ?></label>
                    <!-- City Dropdown -->
                    <select class="form-control" wire:model="selectedCity" name="<?php echo e($city_field_name); ?>">
                        <option value="0" disabled selected>Select City</option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city->id); ?>"><?php echo e($city->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-lg-4 col-md-4">
            <?php if((isset($areas) && $show_areas )|| $selectedArea): ?>
                <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo app('translator')->get('message.select_area'); ?></label>
                    <!-- City Dropdown -->
                    <select class="form-control" wire:model="selectedArea" name="<?php echo e($area_field_name); ?>">
                        <option value="0" disabled selected>Select area</option>
                        <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($area->id); ?>"><?php echo e($area->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/eslam/Documents/DoctorAppointments/resources/views/livewire/locations-filter.blade.php ENDPATH**/ ?>
<div>
    
    <a role="button" href="<?php echo e(route('areas.edit',$model->id)); ?>" class="btn btn-sm btn-warning">
        <i class="fa fa-edit"></i>
    </a>
    

    
    <button role="button"
            data-url="<?php echo e(route('areas.destroy',$model->id)); ?>"
            class="btn btn-sm btn-danger delete-btn me-1 delete-row">
        <i class="fa fa-trash"></i>
    </button>
    

</div>
<?php /**PATH /home/eslam/Documents/DoctorAppointments/resources/views/admin/locations/area/components/_action.blade.php ENDPATH**/ ?>
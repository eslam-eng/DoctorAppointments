<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "2000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
<?php if(session()->has('toast')): ?>
    <script>
        <?php switch(session('toast')['type']??'success'):

        case ('error'): ?>
            toastr.error("<?php echo e(session('toast')['message']); ?>","<?php echo e(session('toast')['title']); ?>");
        <?php break; ?>

        <?php case ('info'): ?>
            toastr.info("<?php echo e(session('toast')['message']); ?>","<?php echo e(session('toast')['title']); ?>")
        <?php break; ?>

        <?php default: ?>
            toastr.success("<?php echo e(session('toast')['message']); ?>","<?php echo e(session('toast')['title']); ?>")
        <?php endswitch; ?>

    </script>

<?php endif; ?>
<?php /**PATH /home/eslam/Documents/DoctorAppointments/resources/views/admin/inc/toast.blade.php ENDPATH**/ ?>
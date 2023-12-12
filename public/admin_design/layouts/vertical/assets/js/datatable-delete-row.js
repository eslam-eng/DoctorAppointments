$(document).on('click', '.delete-row', function () {
    const url = $(this).data('url');
    const reloadPage = $(this).data('reload') || 0;
    Swal.fire({
        title: 'Are You Sure ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'DELETE',
                url: url,
                dataType: 'json',
                data: {
                    '_token':  $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (result) {
                    if (result.status) {
                        toastr.success(result.message);
                        if (reloadPage === '1')
                            window.location.reload();
                        else
                            $('.dataTable').DataTable().ajax.reload(null, false);
                    } else
                        toastr.error(result.message);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    let errors = jqXHR.responseJSON;
                    toastr.error(errors.message, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
            });
        }
    })
});

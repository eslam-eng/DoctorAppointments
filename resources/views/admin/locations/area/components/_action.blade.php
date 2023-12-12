<div>
    {{--    @can('edit_coupon')--}}
    <a role="button" href="{{route('areas.edit',$model->id)}}" class="btn btn-sm btn-warning">
        <i class="fa fa-edit"></i>
    </a>
    {{--    @endcan--}}

    {{--    @can('delete_coupon')--}}
    <button role="button"
            data-url="{{route('areas.destroy',$model->id)}}"
            class="btn btn-sm btn-danger delete-btn me-1 delete-row">
        <i class="fa fa-trash"></i>
    </button>
    {{--    @endcan--}}

</div>

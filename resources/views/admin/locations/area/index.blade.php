@extends('admin.layout')
@section('title')
    {{__("message.areas_list")}} | {{__("message.Admin")}} {{__("message.areas_list")}}
@stop
@section('css')
@stop
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{__("message.areas_list")}}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">{{__("message.areas_list")}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <p><a class="btn btn-primary" href="{{route('areas.create')}}">{{__("message.add_area")}}</a></p>
                                @include('admin.components._table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    {!! $dataTable->scripts() !!}
@stop

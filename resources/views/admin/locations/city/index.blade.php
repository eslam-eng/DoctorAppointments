@extends('admin.layout')
@section('title')
    {{__("message.banner")}} | {{__("message.Admin")}} {{__("message.banner")}}
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
                            <h4 class="mb-0">{{__("message.banner")}}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">{{__("message.banner")}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{__("message.cities")}} {{__("message.cities_list")}}</h4>
                                <p><a class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">{{__("message.Add Banner")}}</a></p>
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

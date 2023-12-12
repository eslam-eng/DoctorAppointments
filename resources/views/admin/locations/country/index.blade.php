@extends('admin.layout')
@section('title')
    {{__("message.countries_title")}} | {{__("message.Admin")}} {{__("message.countries_title")}}
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
                            <h4 class="mb-0">{{__("message.countries_list")}}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">{{__("message.countries_list")}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <p><a class="btn btn-primary" href="{{route('countries.create')}}">{{__("message.add_country")}}</a></p>
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

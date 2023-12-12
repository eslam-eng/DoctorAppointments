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
                                <form action="{{route('countries.store')}}" class="needs-validation" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="department_id">{{__("message.countries_list")}}<span
                                                        class="reqfield">*</span></label>
                                                <select class="form-control select2" name="country_code" id="country" required="">
                                                    <option disabled selected>{{__("message.select_country")}}</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country['code']}}">{{$country['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('country_code')
                                                <div class="text text-danger">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="department_id">{{__("message.Currency")}}<span
                                                        class="reqfield">*</span></label>
                                                <select class="form-control select2" name="currency_code" id="currency_code" required="">
                                                    <option disabled selected>{{__("message.select_currency")}}</option>
                                                    @foreach($currencies as $currency)
                                                        <option value="{{$currency['cc']}}">{{$currency['name']}}({{$currency['symbol']}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('currency_code')
                                            <div class="text text-danger">{{$message}}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="status" type="checkbox" checked  id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    @lang('message.Status')
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary"><i class="uil-save"></i> @lang('message.save')</button>
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
@stop
@section('footer')
    <script>
        $('.select2').select2();
    </script>
@stop



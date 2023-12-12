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
                            <h4 class="mb-0">{{__("message.cities_edit")}}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">{{__("message.cities_edit")}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('cities.update',$city->id)}}" class="needs-validation" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="department_id">{{__("message.countries_title")}}<span
                                                        class="reqfield">*</span></label>
                                                <select class="form-control" name="parent_id" id="country" required="">
                                                    <option disabled selected>{{__("message.select_country")}}</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}" {{$country->id == $city->parent_id?'selected':''}}>{{$country->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('parent_id')
                                            <div class="text text-danger">{{$message}}</div>
                                            @enderror
                                        </div>

                                        @foreach(\App\Enum\AvailableLocales::cases() as $locale)
                                            <div class="col-lg-4 col-md-4">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                           for="first-name-column">{{ __('pages.name_'.$locale->value) }}
                                                    </label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                           placeholder="{{ __('pages.name_'.$locale->value) }}" value="{{$city->getTranslation('title',$locale->value)}}"
                                                           name="title[{{$locale->value}}]">
                                                </div>
                                                @error('title.'.$locale->value)
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="status" type="checkbox" {{$city->status ? 'checked' : ''}}  id="defaultCheck1">
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

@stop



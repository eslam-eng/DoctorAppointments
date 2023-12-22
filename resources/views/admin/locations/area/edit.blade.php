@extends('admin.layout')
@section('title')
    {{__("message.areas_title")}} | {{__("message.Admin")}} {{__("message.areas_title")}}
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
                            <h4 class="mb-0">{{__("message.areas_edit")}}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">{{__("message.areas_edit")}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('areas.update',$area->id)}}" class="needs-validation"
                                      method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <livewire:locations-filter
                                        selected-country="{{$area->ancestors->first()->id}}"
                                        :cities="$cities"
                                        selected-city="{{$area->ancestors->skip(1)->first()->id}}"
                                        city_field_name="parent_id"/>
                                    <div class="row">
                                        @foreach(\App\Enum\AvailableLocales::cases() as $locale)
                                            <div class="col-lg-4 col-md-4">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                           for="first-name-column">{{ __('pages.name_'.$locale->value) }}
                                                    </label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                           placeholder="{{ __('pages.name_'.$locale->value) }}"
                                                           value="{{$area->getTranslation('title',$locale->value)}}"
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
                                                <input class="form-check-input" name="status" type="checkbox"
                                                       {{$area->status ? 'checked' : ''}}  id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    @lang('message.Status')
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="uil-save"></i> @lang('message.save')</button>
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
        document.addEventListener('livewire:load', function () {
            // Your jQuery code here
            $(document).ready(function () {

            });
        });
    </script>
@stop



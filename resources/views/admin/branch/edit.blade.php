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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">{{__("message.branch_edit")}}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">{{__("message.branch_edit")}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('branches.update',$branch->id)}}" class="needs-validation" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <livewire:locations-filter
                                    selected-country="{{$city->parent_id}}"
                                    city_field_name="city_id"
                                    area_field_name="area_id"
                                    :cities="$city->ancestors->first()->children"
                                    :areas="$city->children"
                                    selected-city="{{$city->id}}"
                                    selected-area="{{$branch->area_id}}"
                                />
                                @error('city_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                @error('area_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <div class="row">

                                    @foreach(\App\Enum\AvailableLocales::cases() as $locale)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                       for="name{{$locale->value}}">{{ __('message.name_'.$locale->value) }}
                                                    @if($loop->first)
                                                        <span class="text text-danger">*</span>
                                                    @endif
                                                </label>
                                                <input type="text" id="name{{$locale->value}}" value="{{old('name.'.$locale->value,$branch->getTranslation('name',$locale->value))}}" class="form-control"
                                                       placeholder="{{ __('message.name'.$locale->value) }}"
                                                       name="name[{{$locale->value}}]">
                                            </div>
                                            @error('name.'.$locale->value)
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                   for="phone">{{ __('message.phone') }}
                                                <span class="text text-danger">*</span>
                                            </label>
                                            <input type="text" id="phone" class="form-control"
                                                   placeholder="{{ __('message.phone') }}" value="{{old('phone',$branch->phone)}}"
                                                   name="phone">

                                        </div>
                                        @error('phone')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                   for="phone">{{ __('message.url') }}
                                            </label>
                                            <input type="url" id="phone" class="form-control"
                                                   placeholder="{{ __('message.url') }}" value="{{old('map_url',$branch->map_url)}}"
                                                   name="map_url">
                                        </div>
                                        @error('map_url')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-8 col-md-8">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                   for="phone">{{ __('message.address') }}
                                            </label>
                                            <input type="text" id="phone" value="{{old('address',$branch->address)}}" class="form-control"
                                                   placeholder="{{ __('message.address') }}"
                                                   name="address">
                                        </div>
                                        @error('address')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="checkbox" {{$branch->status ? 'checked' : ''}}
                                                   id="defaultCheck1">
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



<div>
    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">@lang('message.select_country')</label>
                <!-- Country Dropdown -->
                <select class="form-control" wire:model="selectedCountry"
                        name="{{$country_field_name}}">
                    <option value="0" disabled selected>@lang('message.select_country')</option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            @if(isset($cities) || $selectedCity)
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('message.select_city')</label>
                    <!-- City Dropdown -->
                    <select class="form-control" wire:model="selectedCity" name="{{$city_field_name}}">
                        <option value="0" disabled selected>Select City</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->title }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>

        <div class="col-lg-4 col-md-4">
            @if((isset($areas) && $show_areas )|| $selectedArea)
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('message.select_area')</label>
                    <!-- City Dropdown -->
                    <select class="form-control" wire:model="selectedArea" name="{{$area_field_name}}">
                        <option value="0" disabled selected>Select area</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->title }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>
</div>

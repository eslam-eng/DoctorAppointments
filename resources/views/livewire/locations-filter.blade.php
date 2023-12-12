<div>
    <div class="row">

        <div class="col-lg-6 col-md-6">
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
        <div class="col-lg-6 col-md-6">
            @isset($cities)
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
            @endisset
        </div>
    </div>
</div>

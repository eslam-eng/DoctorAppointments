<?php

namespace App\Http\Livewire;

use App\Services\LocationsService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class LocationsFilter extends Component
{
    public Collection $countries;
    public Collection $cities;
    public Collection $areas;
    public mixed $selectedCountry = 0;
    public mixed $selectedCity = 0;

    public string $country_field_name = 'country_id';
    public string $city_field_name = 'city_id';

    public function mount()
    {
        $this->countries = app()->make(LocationsService::class)->getQuery(['depth' => 0])->get();
    }

    public function updatedSelectedCountry()
    {
        $this->cities = app()->make(LocationsService::class)->getQuery(['depth' => 1, 'parent_id' => $this->selectedCountry])->get();
    }

//    public function updatedSelectedCity()
//    {
//        $this->areas = app()->make(LocationsService::class)->getQuery(['depth' => 2, 'parent_id' => $this->selectedCity])->get();
//
//    }

    public function render()
    {
        return view('livewire.locations-filter');
    }
}

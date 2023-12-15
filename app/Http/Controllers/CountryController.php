<?php

namespace App\Http\Controllers;

use App\Datatables\Location\CountriesDataTable;
use App\Http\Requests\Locations\Country\CountryRequest;
use App\Models\Location;
use App\Services\LocationsService;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function __construct(private LocationsService $locationService)
    {

    }

    public function index(CountriesDataTable $dataTables,Request $request)
    {
        $filters = array_filter($request->get('filters', []), function ($value) {
            return ($value !== null && $value !== false && $value !== '');
        });
        $filters['depth'] = 0 ;
        return $dataTables->with(['filters'=>$filters])->render('admin.locations.country.index');
    }

    public function create()
    {
        $countries = getCountries();
        $currencies = getCurrencies();

        return view('admin.locations.country.create', ['countries' => $countries,'currencies'=>$currencies]);
    }

    public function store(CountryRequest $request)
    {
        try {
            $countries = collect(getCountries());
            $country = $countries->firstWhere('code',$request->country_code);
            $locationData=[
              'title'=>[
                  'en'=>$country['name'],
                  'ar'=>$country['nameAr']
              ],
              'currency_code'=>$request->currency_code,
              'status' =>$request->status,
            ];

            $this->locationService->store($locationData);
            $toast=[
                'type'=>'success',
                'title'=>trans('lang.title'),
                'message'=> 'country saved Successfully'
            ];
            return redirect(route('countries.index'))->with('toast', $toast);
        }catch (\Exception $exception)
        {
            $toast=[
                'type'=>'error',
                'title'=>trans('lang.error'),
                'message'=>$exception->getMessage()
            ];
            return back()->with('toast',$toast);
        }
    }

    public function edit(Location $country)
    {
        $countries = getCountries();
        $currencies = getCurrencies();

        return view('admin.locations.country.edit',['location' => $country, 'currencies' => $currencies,'countries' => $countries]);
    }

    public function update(Location $country, CountryRequest $request)
    {

        try {
            $locationcountries = collect(getCountries());
            $locationcountry = $locationcountries->firstWhere('code',$request->country_code);
            $locationData=[
                'title'=>[
                    'en'=>$locationcountry['name'],
                    'ar'=>$locationcountry['nameAr']
                ],
                'currency_code'=>$request->currency_code,
                'status' =>$request->status,
            ];
            $this->locationService->update($country, $locationData);
            $toast=[
                'type' => 'success',
                'title'=>trans('message.Success'),
                'message'=>trans('message.Success')
            ];
            return  redirect(route('countries.index'))->with('toast',$toast);
        }catch (\Exception $exception)
        {
            $toast = [
                'type'=>'error',
                'title'=>trans('message.Error'),
                'message'=>$exception->getMessage()
            ];
            return back()->with('toast',$toast);
        }
    }

    public function destroy(Location $country)
    {
        try {
            $this->locationService->delete($country);
            return apiResponse(message: trans('lang.success'));
        }catch (\Exception $exception)
        {
            return apiResponse(message: $exception->getMessage(),code: 422);
        }
    }

}

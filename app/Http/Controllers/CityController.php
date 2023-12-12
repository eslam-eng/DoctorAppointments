<?php

namespace App\Http\Controllers;

use App\Datatables\CitiesDataTable;
use App\Http\Requests\Locations\City\CityRequest;
use App\Models\Location;
use App\Services\LocationsService;
use Illuminate\Http\Request;
class CityController extends Controller
{
   public function __construct(protected LocationsService $locationService)
    {

    }

    public function index(CitiesDataTable $dataTables,Request $request)
    {
        $filters = array_filter($request->get('filters', []), function ($value) {
            return ($value !== null && $value !== false && $value !== '');
        });
        $filters['depth'] = 1;
        return $dataTables->with(['filters'=>$filters])->render('admin.locations.city.index');
    }

    public function create()
    {
        $countries = $this->locationService->getCountries();
        return view('admin.locations.city.create',['countries'=>$countries]);
    }

    public function store(CityRequest $request)
    {
        try {
            $locationData=[
                'title'=>[
                    'en'=>$request->title['en'],
                    'ar'=>$request->title['ar'] ?? $request->title['en']
                ],
                'parent_id'=>$request->parent_id,
                'status' =>$request->status,
            ];
            $this->locationService->store($locationData);
            $toast=['type'=>'success','title'=>trans('message.Success'),'message'=> trans('message.city_saved_Successfully')];
            return redirect(route('cities.index'))->with('toast',$toast);
        }catch (\Exception $exception)
        {
            $toast=['type'=>'error','title'=>trans('lang.error'),'message'=>$exception->getMessage()];
            return back()->with('toast',$toast);
        }
    }

    public function edit(Location $city)
    {
        $countries = $this->locationService->getCountries();
        return view('admin.locations.city.edit',['city' => $city, 'countries' =>$countries]);
    }

    public function update(Location $city, CityRequest $request)
    {
        try {
            $locationData=[
                'title'=>[
                    'en'=>$request->title['en'],
                    'ar'=>$request->title['ar'] ?? $request->title['en']
                ],
                'parent_id'=>$request->parent_id,
                'status' =>$request->status,
            ];
            $this->locationService->update($city,$locationData);
            $toast=[
                'type' => 'success',
                'title'=>trans('lang.success'),
                'message'=>trans('lang.success')
            ];
            return  redirect(route('cities.index'))->with('toast',$toast);
        }catch (\Exception $exception)
        {
            $toast = [
                'type'=>'error',
                'title'=>trans('lang.error'),
                'message'=>$exception->getMessage()
            ];
            return back()->with('toast',$toast);
        }
    }

    public function destroy(Location $city)
    {
        try {
            $this->locationService->delete($city);
            return apiResponse(message: trans('lang.success'));
        }catch (\Exception $exception)
        {
            return apiResponse(message: $exception->getMessage(),code: 422);
        }
    }

}

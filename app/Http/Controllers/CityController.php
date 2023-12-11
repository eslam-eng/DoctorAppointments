<?php

namespace App\Http\Controllers;

use App\Datatables\CitiesDataTable;
use App\Services\LocationsService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLocationRequest;
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
        $filters['depth'] = 2;
        return $dataTables->with(['filters'=>$filters])->render('admin.locations.city.index');
    }

    public function create(Request $request)
    {
        $filter = ['depth'=> 1];
        $governorates = $this->locationService->getAll($filter);
        return view('dashboard.locations.city.create',['governorates'=>$governorates]);
    }

    public function store(StoreLocationRequest $request)
    {
        try {
            $this->locationService->store($request->all());
            $toast=['type'=>'success','title'=>trans('lang.title'),'message'=> trans('lang.city_saved_Successfully')];
            return redirect(route('city.index'))->with('toast',$toast);

        }catch (\Exception $exception)
        {
            $toast=['type'=>'error','title'=>trans('lang.error'),'message'=>$exception->getMessage()];
            return back()->with('toast',$toast);
        }
    }

    public function edit(Request $request, $id)
    {
        $city = $this->locationService->getLocationById($id);
        if (!$city)
        {
            $toast = [
              'type'=>'error',
              'title'=>trans('error'),
              'message'=>trans('lang.not_found')
            ];
            return back()->with('toast',$toast);
        }
        $filter =[
            'depth'=> 1,
            'is_active'=>1
        ];
        $governorates = $this->locationService->getAll($filter);
        return view('dashboard.locations.city.edit',['city' => $city, 'governorates' =>$governorates]);
    }

    public function update($id, StoreLocationRequest $request)
    {
        try {
            $this->locationService->update($id, $request->all());
            $toast=[
                'type' => 'success',
                'title'=>trans('lang.success'),
                'message'=>trans('lang.success')
            ];
            return  redirect(route('city.index'))->with('toast',$toast);
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

    public function destroy(int $location_id)
    {
        try {
            $result =  $this->locationService->delete($location_id);
            if(!$result)
                return apiResponse(message: trans('lang.not_found'),code: 404);
            return apiResponse(message: trans('lang.success'));

        }catch (\Exception $exception)
        {
            return apiResponse(message: $exception->getMessage(),code: 422);
        }
    }

}

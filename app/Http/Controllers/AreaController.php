<?php

namespace App\Http\Controllers;

use App\Datatables\Location\AreasDataTable;
use App\Http\Requests\Locations\Area\AreaRequest;
use App\Models\Location;
use App\Services\LocationsService;
use Illuminate\Http\Request;


class AreaController extends Controller
{

    public function __construct(private LocationsService $locationService)
    {

    }

    public function index(AreasDataTable $dataTables,Request $request)
    {
        $filters = array_filter($request->get('filters', []), function ($value) {
            return ($value !== null && $value !== false && $value !== '');
        });

        $filters['depth'] = 2;

        return $dataTables->with(['filters'=>$filters])->render('admin.locations.area.index');
    }

    public function create()
    {
        return view('admin.locations.area.create');
    }

    public function store(AreaRequest $request)
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
            return redirect(route('areas.index'))->with('toast',$toast);
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

    public function edit(Location $area)
    {
        $cities = collect($area->ancestors->first()->children);
        return view('admin.locations.area.edit',['area' => $area,'cities'=>$cities]);
    }

    public function update(Location $area, AreaRequest $request)
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
            $this->locationService->update($area,$locationData);

            $toast=[
                'type' => 'success',
                'title'=>trans('lang.success'),
                'message'=>trans('lang.success')
            ];
            return  redirect(route('areas.index'))->with('toast',$toast);
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

    public function destroy(Location $area)
    {
        try {
            $this->locationService->delete($area);
            return apiResponse(message: trans('lang.success'));
        }catch (\Exception $exception)
        {
            return apiResponse(message: $exception->getMessage(),code: 422);
        }
    }
}

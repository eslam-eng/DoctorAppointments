<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRegisterRequest;
use App\Services\DoctorsService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct(public DoctorsService $doctorService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        return $this->doctorService->paginate(filters: $filters);
    }


    public function store(DoctorRegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $this->doctorService->create($data);
            return apiResponse(message: __('message.Doctor Add Successfully'));
        }catch (\Exception $exception)
        {
            return apiResponse(null,$exception->getMessage(),500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

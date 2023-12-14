<?php

namespace App\Http\Controllers;

use App\Datatables\Branch\BranchesDataTable;
use App\Http\Requests\Branch\BranchRequest;
use App\Models\Branch;
use App\Services\BranchesService;
use Illuminate\Http\Request;


class BranchController extends Controller
{

    public function __construct(protected BranchesService $branchesService)
    {
    }

    public function index(BranchesDataTable $dataTables, Request $request)
    {
        $filters = array_filter($request->get('filters', []), function ($value) {
            return ($value !== null && $value !== false && $value !== '');
        });

        return $dataTables->with(['filters' => $filters])->render('admin.branch.index');
    }

    public function create()
    {
        return view('admin.branch.create');
    }

    public function store(BranchRequest $request)
    {
        try {
            $branchData = $this->handleBranchData($request);
            $this->branchesService->store($branchData);
            $toast = ['type' => 'success', 'title' => trans('message.Success'), 'message' => trans('message.branch_added_successfully')];
            return redirect(route('branches.index'))->with('toast', $toast);
        } catch (\Exception $exception) {
            $toast = [
                'type' => 'error',
                'title' => trans('lang.error'),
                'message' => $exception->getMessage()
            ];
            return back()->with('toast', $toast);
        }
    }

    public function edit(Branch $branch)
    {
        return view('admin.branch.edit', ['branch' => $branch]);
    }

    public function update(Branch $branch, BranchRequest $request)
    {
        try {
            $branchData = $this->handleBranchData($request);

            $this->branchesService->update($branch, $branchData);

            $toast = [
                'type' => 'success',
                'title' => trans('lang.success'),
                'message' => trans('lang.success')
            ];
            return redirect(route('branches.index'))->with('toast', $toast);
        } catch (\Exception $exception) {
            $toast = [
                'type' => 'error',
                'title' => trans('lang.error'),
                'message' => $exception->getMessage()
            ];
            return back()->with('toast', $toast);
        }
    }

    public function destroy(Branch $branch)
    {
        try {
            $this->branchesService->delete($branch);
            return apiResponse(message: trans('lang.success'));
        } catch (\Exception $exception) {
            return apiResponse(message: $exception->getMessage(), code: 422);
        }
    }

    private function handleBranchData(BranchRequest $request)
    {
        return [
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'] ?? $request->name['en']
            ],
            'phone' => $request->phone,
            'address' => $request->address,
            'map_url' => $request->map_url,
            'location_id' => $request->location_id,
            'status' => $request->status,
        ];

    }
}

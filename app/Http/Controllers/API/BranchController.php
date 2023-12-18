<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchesResource;
use App\Services\BranchesService;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function __construct(public BranchesService $branchesService)
    {
    }

    public function __invoke(Request $request)
    {
        $filters = $request->get('filters');
        $filters['status'] = true;
        return BranchesResource::collection($this->branchesService->all($filters));
    }
}

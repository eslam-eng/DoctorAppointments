<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\BranchesService;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public $branchService ;
    public function __invoke(Request $request,BranchesService $branchesService)
    {
        $this->branchService = $branchesService;
        $filters = $request->get('filters');
        $filters['status'] = true;
        return $this->branchService->paginate($filters);
    }
}

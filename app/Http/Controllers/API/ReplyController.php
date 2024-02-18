<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reply\ReplyRequest;
use App\Models\Reply;
use App\Services\Reply\ReplyService;
use Sentinel;

class ReplyController extends Controller
{

    public function __construct(public ReplyService $replyService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReplyRequest $request)
    {
        try {

            $data = $request->validated();
            $question = $this->replyService->store(data: $data);
            return apiResponse(message: 'created successfully');

        } catch (\Exception $exception) {
            return apiResponse(message: $exception->getMessage(), code: 500);
        }
    }


    /**
     * @param ReplyRequest $request
     * @param Reply $reply
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(ReplyRequest $request, Reply $reply)
    {
        try {
            $data = $request->validated();
            $this->replyService->update(reply: $reply, data: $data);
            return apiResponse(message: 'updated Successfully');
        } catch (\Exception $exception) {
            return apiResponse(message: $exception->getMessage(), code: 500);
        }
    }

    /**
     * @param Reply $reply
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        try {
            $this->replyService->delete($reply);
            return apiResponse(message: 'deleted successfully');
        } catch (\Exception $exception) {
            return apiResponse(message: $exception->getMessage(), code: 500);
        }
    }
}

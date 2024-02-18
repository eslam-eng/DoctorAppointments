<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\QuestionRequest;
use App\Http\Resources\QuestionsResource;
use App\Models\Question;
use App\Services\Question\QuestionsService;
use Illuminate\Http\Request;
use Sentinel;

class QuestionController extends Controller
{
    public function __construct(public QuestionsService $questionsService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $filters = array_filter($request->get('filters', []), function ($value) {
            return ($value !== null && $value !== false && $value !== '');
        });
        $questions = $this->questionsService->paginate($filters);
        return QuestionsResource::collection($questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        try {

            $data = $request->validated();
            $question = $this->questionsService->store(data: $data);
            return apiResponse(data: new QuestionsResource($question), message: 'created successfully');

        } catch (\Exception $exception) {
            return apiResponse(message: $exception->getMessage(), code: 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return QuestionsResource
     */
    public function show($id)
    {
        $question = $this->questionsService->details($id);
        if ($question)
            return new QuestionsResource($question);
        return apiResponse( message: 'question not found');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        try {
            $data = $request->validated();
            $this->questionsService->update(question: $question, data: $data);
            return apiResponse(message: 'updated Successfully');
        } catch (\Exception $exception) {
            return apiResponse(message: $exception->getMessage(), code: 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        try {
            $this->questionsService->delete($question);
            return apiResponse(message: 'deleted successfully');
        } catch (\Exception $exception) {
            return apiResponse(message: $exception->getMessage(), code: 500);
        }
    }
}

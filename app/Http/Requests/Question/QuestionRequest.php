<?php

namespace App\Http\Requests\Question;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;
use Sentinel;
class QuestionRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => 'required|string',
            'relatable_id'=>'required|integer',
            'relatable_type'=>['required',Rule::in(['doctor','patient'])]
        ];
    }

}

<?php

namespace App\Http\Requests\Reply;

use App\Http\Requests\BaseRequest;
use Sentinel;
class ReplyRequest extends BaseRequest
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
            'question_id' => 'required|integer',
            'user_id' => 'required|exists:users,id',
            'reply' => 'required|string',
        ];
    }

}

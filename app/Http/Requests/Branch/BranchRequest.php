<?php

namespace App\Http\Requests\Branch;

use App\Http\Requests\BaseRequest;

class BranchRequest extends BaseRequest
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
            'name' => 'required|array|min:1',
            'name.en' => 'required|required',
            'phone' => 'required|string',
            'location_id' => 'required|integer|exists:locations,id',
            'address'=>'required|string',
            'map_url'=>'nullable|string|url',
            'status'=>'required|boolean'
        ];
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'status'=>$this->boolean('status')
        ]);
    }
}

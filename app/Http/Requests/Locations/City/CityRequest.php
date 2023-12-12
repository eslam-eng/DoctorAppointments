<?php

namespace App\Http\Requests\Locations\City;

use App\Http\Requests\BaseRequest;

class CityRequest extends BaseRequest
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
            'title'=>'required|array|min:1',
            'title.en'=>'required|string',
            'parent_id'=>'required|integer|exists:locations,id',
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

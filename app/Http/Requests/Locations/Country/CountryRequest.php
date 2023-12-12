<?php

namespace App\Http\Requests\Locations\Country;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends BaseRequest
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
            'country_code'=>'required',
            'currency_code'=>'required',
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

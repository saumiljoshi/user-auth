<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
        $rules = [
            'name'=>[
                'required'
            ],
            'email'=>[
                'required',
                'email',
                Rule::unique('users'),
            ],
            'password'=>[
                'required'
            ],
            'mobile_no'=>[
                'required',
                'max:10'
            ],
        ];

        if ($this->getMethod() == 'PUT') {
            $rules['email'] = 'nullable';
        }

        return $rules;
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => 'required',
            'ci' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'departamento' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio ',
            'email.required' => 'El campo correo es obligatorio',
            'password.required' => 'El campo contraña es obligatorio',
        ];
    }
}

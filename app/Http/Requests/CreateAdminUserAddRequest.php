<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminUserAddRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:20','min:3'],
            'lastname' => ['required', 'string', 'max:20','min:5'],
            'address' => [ 'string', 'max:30','min:5'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:3' ],
            'usertype' => ['max:15'],
            'balanse' => ['numeric'],
        ];


    }

}

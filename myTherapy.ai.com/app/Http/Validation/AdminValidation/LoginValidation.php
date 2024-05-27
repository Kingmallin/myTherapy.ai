<?php
namespace App\Http\Validation\AdminValidation;

use Illuminate\Foundation\Http\FormRequest;

class LoginValidation extends FormRequest
{
    public function rules(): array
    {
        return [
            'uname' => 'required|string|max:255',
            'psw' => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'uname.required' => 'Username or email is required',
            'psw.required' => 'Password is required'
        ];
    }
}

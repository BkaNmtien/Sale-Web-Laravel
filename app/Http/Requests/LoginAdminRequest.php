<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
                'email' => 'required|email|exists:users',
                'password' => 'required',
            
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Bạn vui lòng nhập email!',
            'email.exists' => 'Email đã tồn tại!',
            'email.email' => 'Vui lòng nhập email hợp lệ!',
            'password.required' => 'Bạn vui lòng nhập mật khẩu!',
        ]; 
    }
}
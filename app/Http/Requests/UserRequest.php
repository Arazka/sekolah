<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $username_unique = Rule::unique('users', 'username');
        if ($this->method() !== 'POST') {
            $username_unique->ignore($this->route()->parameter('id'));
        }

        return [
            'type' => 'required|in:admin,user',
            'username' => 'required|string', $username_unique,
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/',
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'isian : attribute harus diisi / tidak boleh kosong!',
            'password.min' => 'Password harus memiliki setidaknya 6 karakter',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf besar, satu angka, dan satu karakter khusus. Misal: User@123',
        ];
    }
}

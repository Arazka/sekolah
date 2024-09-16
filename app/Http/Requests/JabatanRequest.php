<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JabatanRequest extends FormRequest
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
        $kode_jabatan_unique = Rule::unique('jabatans', 'kode_jabatan');
        if ($this->method() !== 'POST') {
            $kode_jabatan_unique->ignore($this->route()->parameter('id'));
        }

        return [
            'kode_jabatan' => ['required','string',$kode_jabatan_unique],
            'nama_jabatan' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'isian : attribute harus diisi / tidak boleh kosong!',
            'kode_jabatan.unique' => 'Kode jabatan harus unik atau berbeda dari yang lain!'
        ];
    }
}

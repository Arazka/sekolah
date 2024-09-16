<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KelasRequest extends FormRequest
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
        $kode_kelas_unique = Rule::unique('kelas', 'kode_kelas');
        if ($this->method() !== 'POST') {
            $kode_kelas_unique->ignore($this->route()->parameter('id'));
        }

        return [
            'kode_kelas' => ['required','string',$kode_kelas_unique],
            'nama_kelas' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'isian : attribute harus diisi / tidak boleh kosong!',
            'kode_kelas.unique' => 'Kode kelas harus unik atau berbeda dari yang lain!'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TugasKaryawanRequest extends FormRequest
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
        $kode_tugas_unique = Rule::unique('tugas_karyawans', 'kode_tugas');
        if ($this->method() !== 'POST') {
            $kode_tugas_unique->ignore($this->route()->parameter('id'));
        }

        return [
            'kode_tugas' => ['required','string',$kode_tugas_unique],
            'nama_tugas' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'isian : attribute harus diisi / tidak boleh kosong!',
            'kode_tugas.unique' => 'Kode mapel harus unik atau berbeda dari yang lain!'
        ];
    }
}

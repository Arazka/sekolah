<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MapelRequest extends FormRequest
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
        $kode_mapel_unique = Rule::unique('mapels', 'kode_mapel');
        if ($this->method() !== 'POST') {
            $kode_mapel_unique->ignore($this->route()->parameter('id'));
        }

        return [
            'kode_mapel' => ['required','string',$kode_mapel_unique],
            'nama_mapel' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'isian : attribute harus diisi / tidak boleh kosong!',
            'kode_mapel.unique' => 'Kode mapel harus unik atau berbeda dari yang lain!'
        ];
    }
}

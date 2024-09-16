<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EkstrakurikulerRequest extends FormRequest
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
        return [
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'nama' => 'required|string',
            'deskripsi' => 'required',
            'kategori' => 'string|required',
            'jadwal_pertemuan' => 'string|required',
            'koordinator_kegiatan' => 'string|required',
            'lokasi_kegiatan' => 'string|required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'isian : attribute harus diisi / tidak boleh kosong!',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Hanya gambar dengan ekstensi jpeg, png, jpg, atau gif yang diizinkan.',
            'foto.max' => 'Ukuran foto harus lebih kecil dari 5 MB.',
        ];
    }
}

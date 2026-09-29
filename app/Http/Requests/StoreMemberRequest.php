<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMemberRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:200',
            'nim' => ['required', 'digits_between:1,20', Rule::unique('members', 'nim')],
            'email' => ['required', 'email', 'max:200', Rule::unique('members', 'email')],
            'nomor_telepon' => 'required|digits_between:1,20',
            'alamat' => 'required|string|max:300',
            'status' => 'required|in:aktif,nonaktif',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 200 karakter.',
            'nim.required' => 'NIM wajib diisi.',
            'nim.digits_between' => 'NIM harus angka maks 20 digit',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.max' => 'Email maksimal 200 karakter.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'nomor_telepon.digits_between' => 'Masukkan angka maks 20 digit.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat maksimal 300 karakter.',
            'status.required' => 'Kategori wajib dipilih.',
            'status.in' => 'Status tidak valid.',
        ];
    }
}

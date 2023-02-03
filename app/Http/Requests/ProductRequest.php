<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'id_loai' => 'required',
            'ten_san_pham' => 'required',
            'so_luong' => 'required|numeric',
            'gia' => 'required|numeric',
            'mo_ta' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập trường này!',
            'numeric' => 'Vui lòng nhập kiểu số!',
        ];
    }
}

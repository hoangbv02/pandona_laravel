<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'id_kh' => 'required',
            'id_sp' => 'required',
            'so_luong' => 'required|numeric',
            'sdt' => 'required|numeric|min:10',
            'ngay_dat_hang' => 'required',
            'dia_chi' => 'required',
            'trang_thai' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập trường này!',
            'numeric' => 'Vui lòng nhập kiểu số!',
            'min' => 'Vui lòng nhập tối thiểu :min ký tự!'
        ];
    }
}

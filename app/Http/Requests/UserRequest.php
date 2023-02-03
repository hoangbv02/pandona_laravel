<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'ten_kh' => 'required',
            'sdt' => 'required|numeric|min:10',
            'gioi_tinh' => 'required',
            'ngay_sinh' => 'required',
            'dia_chi' => 'required',
            'email' => 'required|email',
            'mat_khau' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập trường này!',
            'numeric' => 'Vui lòng nhập kiểu số!',
            'email' => 'Vui lòng nhập đúng dạng email!',
            'min' => 'Trường này tối thiểu phải :min ký tự!',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhanconggiangdayRequest extends FormRequest{
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
     * @return array
     */
     public function rules()
    {
         return [
        'soluong' => 'required',
        'namhoc' => 'required',
        'diemtoida' => 'required'             
        ];
    }

    public function messages(){

        return [
                'soluong.required' => 'Vui lòng nhập số lượng cá thể.',
                'namhoc.required' => 'Vui lòng nhập năm học.', 
                'diemtoida.required' => 'Vui lòng nhập điểm tối đa có thể phân công.'
            ];

    }
}

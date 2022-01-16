<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ThongbaodanhgiaRequest extends Request
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
     * @return array
     */
    public function rules()
    {
         return [
        'ten' => 'required', 
        'ngaybatdau' => 'required',           
        'ngayketthuc' => 'required',
        ];
    }

    public function messages(){

        return [
                'ten.required' => 'Vui lòng nhập tên Thông báo.',
                'ngaybatdau.required' => 'Vui lòng nhập ngày bắt đầu.', 
                'ngayketthuc.required' => 'Vui lòng nhập ngày kết thúc.',

            ];

    }
}

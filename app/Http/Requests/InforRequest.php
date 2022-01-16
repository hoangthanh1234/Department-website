<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InforRequest extends Request
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
        'ten_vi' => 'required', 
        'ten_en' => 'required',  
        'diachi_vi' => 'required',
        'diachi_en' => 'required',
        'email' => 'required',
        'dienthoai' => 'required'      
        ];
    }

    public function messages(){

        return [
                'ten_vi.required' => 'Vui lòng nhập tên slider.',               
                'ten_en.required' => 'Vui lòng nhập tên slider English.',
                'diachi_vi.required' => 'Vui lòng nhập đại chỉ',
                'diachi_en.required' => 'Vui lòng nhập đại chỉ English',
                'email.required' => 'Vui lòng nhập Email',
                'dienthoai.required' => 'Vui lòng nhập số điện thoại'                
            ];

    }
}

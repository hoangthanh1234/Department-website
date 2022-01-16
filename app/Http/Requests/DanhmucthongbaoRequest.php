<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DanhmucthongbaoRequest extends Request
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
        'ten_en' => 'required'        
        ];
    }

    public function messages(){

        return [
                'ten_vi.required' => 'Vui lòng nhập tên danh mục thông báo.',               
                'ten_en.required' => 'Vui lòng nhập tên danh mục thông báo  English.',                
            ];

    }
}

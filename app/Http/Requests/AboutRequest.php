<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AboutRequest extends Request
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
        'noidung_vi' => 'required',
        'noidung_en' => 'required',
        'title_vi' => 'required',
        'title_en'=>'required',
        'id_bomon' => 'required'              
        ];
    }

    public function messages(){

        return [
                'ten_vi.required' => 'Vui lòng nhập tên giới thiệu.',               
                'ten_en.required' => 'Vui lòng nhập tên giới thiệu English.', 
                'noidung_vi.required' => 'Vui lòng nhập nội dung',
                'noidung_en.required' => 'Vui lòng nhập nội dung English',
                'title_vi.required' => 'Vui lòng nhập title',
                'title_en.required' => 'Vui lòng nhập title English',
                'id_bomon.required' => 'Vui lòng chọn đối tượng'              
            ];

    }
}

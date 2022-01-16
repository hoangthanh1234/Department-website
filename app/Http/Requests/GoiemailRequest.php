<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoiemailRequest extends Request
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
        'title' => 'required',  
        'noidung' => 'required',        
        ];
    }

    public function messages(){

        return [
                'title.required' => 'Vui lòng nhập tiêu đề thư.', 
                'noidung.required' => 'Vui lòng nhập nội dung thư.',   
            ];

    }
}

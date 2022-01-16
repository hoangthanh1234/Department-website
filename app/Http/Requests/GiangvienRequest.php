<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GiangvienRequest extends Request
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
        'email' => 'required',   
          
        ];
    }

    public function messages(){

        return [
                'ten.required' => 'Vui lòng nhập tên giảng viên.', 
                'email.required' => 'Vui lòng nhập Email giảng viên.',                               
            ];

    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SinhvienRequest extends Request
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
        'ma' => 'required',       
        'ten' => 'required',  
          
        ];
    }

    public function messages(){

        return [
                'ma.required' => 'Vui lòng nhập mã sinh viên.', 
                'ten.required' => 'Vui lòng nhập tên sinh viên.',                               
            ];

    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LopRequest extends Request
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
        'malop' => 'required', 
        'tenlop' => 'required'  
          
        ];
    }

    public function messages(){

        return [
                'malop.required' => 'Vui lòng nhập mã lớp.',               
                'tenlop.required' => 'Vui lòng nhập tên tên lớp.', 
                              
            ];

    }
}

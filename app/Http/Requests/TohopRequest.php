<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TohopRequest extends Request
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
        'monxt' => 'required',  
        'khoi'   => 'required'   
        ];
    }

    public function messages(){

        return [
                'ten.required' => 'Vui lòng nhập tên tổ hợp.',               
                'monxt.required' => 'Vui lòng nhập môn xét tuyển cho tổ hợp.',  
                'khoi.required' => 'Vui lòng nhập khối cho tổ hợp.',                
            ];

    }
}

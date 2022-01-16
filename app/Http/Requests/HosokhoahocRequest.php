<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HosokhoahocRequest extends Request
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
        'tencoquanht_vi' => 'required', 
        'tencoquanht_en' => 'required'  
          
        ];
    }

    public function messages(){

        return [
                'tencoquanht_vi.required' => 'Vui lòng nhập tên cơ quan hiện tại.',               
                'tencoquanht_en.required' => 'Vui lòng nhập tên cơ quan hiện tại English.', 
                              
            ];

    }
}

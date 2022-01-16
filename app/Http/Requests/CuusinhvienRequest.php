<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CuusinhvienRequest extends Request
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
        'noicongtac_en' => 'required', 
        'noicongtac_en' => 'required'        
        ];
    }

    public function messages(){

        return [
                'noicongtac_en.required' => 'Vui lòng nhập tên nơi công tác tiếng việt.',               
                'noicongtac_en.required' => 'Vui lòng nhập tên nơi công tác tiếng anh.',                
            ];

    }
}

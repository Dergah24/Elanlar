<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvUpdate extends FormRequest
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

            'title'=>'required|min:3',
            'category_id'=>'required',
            'desc'=>'required|min:5',
            'marka'=>'required|min:3',
            'city'=>'required',
            'price'=>'required',
            
        ];
    }


    public function attributes()
    {
        return [

            'title'=>'Elan adı',
            'category_id'=>'Kateqoriya',
            'desc'=>'Məzmun',
            'marka'=>'Marka',
            'city'=>'Şəhər',
            'price'=>'Qiymət',
           
        ];
    }
}

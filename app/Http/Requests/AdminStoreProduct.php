<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreProduct extends FormRequest
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
            'artisan_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|max:100',  
            'description' => 'required',
            'description_english' => 'required',
            'stock' => 'required',
            'price_mxn' => 'required',
            'price_usd' => 'required',
            'status' => 'required' 
        ];
    }
}

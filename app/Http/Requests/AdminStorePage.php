<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStorePage extends FormRequest
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
            'title' => 'required|max:100',
            'title_english' => 'required|max:100',
            'slug' => 'required',
            'slug_english' => 'required',
            'content' => 'required',
            'content_english' => 'required',
            'position' => 'required',
        ];
    }
}

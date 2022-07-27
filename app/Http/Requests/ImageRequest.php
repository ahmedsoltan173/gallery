<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            // 'name'=>'required|max:255',
            'tag'=>'required|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            // 'image2'=>'mimes:jpeg,png,jpg,gif,svg|max:255',
            'title'=>'required|max:255',
            'description'=>'required|max:255',
            'date'=>'required|before_or_equal:today',

        ];
    }
}

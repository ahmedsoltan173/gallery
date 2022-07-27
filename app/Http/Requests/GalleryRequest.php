<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'title'=>'required|max:255|unique:Gallery,title',
            // 'title2'=>'max:255|unique:Gallery,title',
            'tag'=>'required|max:255',
            'cover'=>'image|mimes:jpeg,png,jpg,gif,svg',

            //
        ];
    }
}


// validation update if changed

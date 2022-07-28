<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
            'title'=>['required','Max:255',
            Rule::unique('Gallery')->ignore($this->id)],
            // unique:Gallery,title,
            'tag'=>'required|max:255',
            'cover'=>'image|mimes:jpeg,png,jpg,gif,svg',

            //
        ];
    }





}


// validation update if changed

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameFormRequest extends FormRequest
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
            'game' => 'required|max:100',
            'genres.*'=>'min:1|integer',
            'image'=>'dimensions:max_width=1920,max_height=1080|nullable|image',
            'release_date' => 'required|date|before:today|after:1950-01-01',
            'developer' => 'required|exists:developers,id',
            'publisher' => 'required|exists:publishers,id',
            'rating' => 'required|min:1|max:10',
            'description' => 'required|max:500',
            'img_save'=>'integer|max:1|min:0',
        ];
    }
}

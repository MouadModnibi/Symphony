<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
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
            'title' => 'min:3',
            'genre' => '',
            'file_path' => 'file|mimetypes:audio/mpeg,audio/mp3|max:10240',

            'cover_image' => 'image|mimes:png,jpg,jpeg,svg|max:10240'
        ];
    }
}

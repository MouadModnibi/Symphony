<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'min:3',
            'email'=> 'email',
            'password'=> '',
            'bio' => '',
            'pfp' => 'image|mimes:png,jpg,jpeg,svg|max:10240'
        ];
        
    }
}

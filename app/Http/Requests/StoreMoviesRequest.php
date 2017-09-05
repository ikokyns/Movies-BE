<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMoviesRequest extends FormRequest
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
            'name' => 'required | between:1,500',
            'director' => 'required',
            'imageURL' => 'url',
            'duration' => 'required',
            'releaseDate' => [
                'required', 
                Rule::unique('movies')
                    ->where(function ($query) {
                        $query->where('name', request()->get('name'));
                    })
            ]
        ];
    }
}

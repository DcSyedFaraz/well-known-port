<?php

namespace App\Http\Requests;

use App\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;

class StoreWebsiteRequest extends FormRequest
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
            'title'         => 'required|regex:/^[A-Za-z -]+$/|max:60',
            'domain'        => 'required|unique:websites,domain|url',
            'slug'          => "required|unique:websites,slug|", new Slug,
            'api_token'     => "required|min:60",
        ];
    }
}

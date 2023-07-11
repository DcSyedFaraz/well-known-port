<?php

namespace App\Http\Requests;

use App\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWebsiteRequest extends FormRequest
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
        // dd($this->route('website'));
        return [
            'title'         => 'required|regex:/^[A-Za-z -]+$/|max:60',
            'domain'        => 'required|unique:websites,domain,'. $this->route('website')->id,
            'slug'          => "required|unique:websites,slug,". $this->route('website')->id,
            'api_token'     => "nullable|string",
        ];
    }
}

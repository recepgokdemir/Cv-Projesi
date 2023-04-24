<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialMediaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required",
            "link" => "required",
            "icon_id" => "required",
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Sosyal medya adı girilmesi zorunludur.",
            "link.required" => "Sosyal medya linki girilmesi zorunludur.",
            "icon_id.required" => "Sosyal medya ikonu girilmesi zorunludur."
        ];
    }

}

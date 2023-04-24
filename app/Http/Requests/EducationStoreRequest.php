<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationStoreRequest extends FormRequest
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
            "school_name" => "required",
            "department" => "required",
            "education_year" => "required",
        ];
    }
    public function messages()
    {
        return [
            "education_year.required" => "Eğitim yılı girilmesi zorunludur.",
            "school_name.required" => "Eğitim Kurumu adı girilmesi zorunludur.",
            "department.required" => "Bölüm adı girilmesi zorunludur."
        ];
    }
}

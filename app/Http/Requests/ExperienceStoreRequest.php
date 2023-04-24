<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceStoreRequest extends FormRequest
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
            "company_name" => "required",
            "task_name" => "required",
            "date" => "required"
        ];
    }

    public function messages()
    {
        return [
            "company_name.required" => "Şirket adı girilmesi zorunludur.",
            "task_name.required" => "Görev adı girilmesi zorunludur.",
            "date.required" => "İşe başlangıç-bitiş tarihi girilmesi zorunludur."
        ];
    }

}

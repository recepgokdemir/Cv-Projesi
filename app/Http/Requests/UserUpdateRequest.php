<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
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
            'name' => ["required"],
            "email" => ["required", "unique:users,id", $this->id],
            "password" => ["nullable", Password::min(5)->symbols()->mixedCase()->letters()->numbers()],
            "job" => ["required"],
            "resume" => ["required"],
            "profile_image" => ['string']
        ];
    }
}

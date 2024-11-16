<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" =>"required",
            "email" =>"required|email",
            "phone" =>"required",
            "title" =>"required",
            "body" =>"required",
            "ip_address" =>"nullable",
        ];
    }

    public function prepareForValidation(){
        $this->merge([
            "ip_address" => request()->ip(), // Corrected the method to get IP
        ]);
    }
}

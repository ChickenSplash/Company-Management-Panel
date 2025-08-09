<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|string|max:64',
            'last_name' => 'required|string|max:64',
            'email' => 'nullable|email|max:128',
            'phone' => 'nullable|regex:/^[0-9\s\-\+\(\)]+$/|min:7|max:20',
            'company_id' => 'nullable|exists:companies,id',
        ];
    }
}

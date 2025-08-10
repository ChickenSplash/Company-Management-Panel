<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|string|max:64',
            'email' => 'nullable|email|max:64',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|dimensions:min_width=100,min_height=100|max:4096',
        ];
    }

    public function messages(): array
    {
        return [
            'logo.image' => 'The uploaded file must be an image.',
            'logo.mimes' => 'Logo must be a file of type: jpeg, png, jpg, gif.',
            'logo.dimensions' => 'Logo must be at least 100x100 pixels.',
            'logo.max' => 'Logo must not be larger than 4MB.',    
        ];
    }
}

<?php

namespace App\Http\Validation\Therapist;

use Illuminate\Foundation\Http\FormRequest;

class NewTherapistValidation extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'additionalSettings' => 'nullable|string', // Assuming it's an array, adjust as needed
            'apiEndpoint' => 'required|string',
            'encryptedApiKey' => 'required|string',
            'name' => 'required|string|max:255',
            'persona' => 'nullable|string', // Assuming this field is optional
            'specialization' => 'required|string|max:255'
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'additionalSettings.string' => 'The additional settings must be an array.',
            'apiEndpoint.required' => 'The API endpoint is required.',
            'apiEndpoint.string' => 'The API endpoint must be a valid URL.',
            'encryptedApiKey.required' => 'The encrypted API key is required.',
            'name.required' => 'The name is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'specialization.required' => 'The specialization is required.',
            'specialization.max' => 'The specialization may not be greater than 255 characters.',
        ];
    }
}

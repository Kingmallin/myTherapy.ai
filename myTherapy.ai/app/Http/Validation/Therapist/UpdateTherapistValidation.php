<?php

namespace App\Http\Validation\Therapist;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTherapistValidation extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|int',
            'additionalSettings' => 'nullable|string', 
            'apiEndPoint' => 'required|string',
            'apiKey' => 'required|string',
            'name' => 'required|string|max:255',
            'persona' => 'nullable|string',
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
            'id.int' => 'id must be an integer',
            'id.required' => 'id is required',
            'additionalSettings.string' => 'The additional settings must be an array.',
            'apiEndPoint.required' => 'The API endpoint is required.',
            'apiEndPoint.string' => 'The API endpoint must be a valid URL.',
            'apiKey.required' => 'The encrypted API key is required.',
            'name.required' => 'The name is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'specialization.required' => 'The specialization is required.',
            'specialization.max' => 'The specialization may not be greater than 255 characters.',
        ];
    }
}

<?php

namespace App\Http\Validation\Blog;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogValidation extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'keywords' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The blog name is required',
            'name.string' => 'The blog name must be a string',
            'name.max' => 'The blog name must not exceed 255 characters',

            'author.required' => 'The author name is required',
            'author.string' => 'The author name must be a string',
            'author.max' => 'The author name must not exceed 255 characters',

            'subject.required' => 'The subject is required',
            'subject.string' => 'The subject must be a string',
            'subject.max' => 'The subject must not exceed 255 characters',

            'content.required' => 'The content is required',
            'content.string' => 'The content must be a string',

            'keywords.string' => 'The keywords must be a string',
            'keywords.max' => 'The keywords must not exceed 255 characters',
        ];
    }
}

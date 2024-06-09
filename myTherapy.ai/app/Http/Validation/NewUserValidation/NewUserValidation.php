<?php

namespace App\Http\Validation\NewUserValidation;

use App\Rules\UniqueUserEmail;
use App\Rules\UniqueUserUsername;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewUserValidation extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surName' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                new UniqueUserUsername($this->getEntityManager()),
            ],
            'penName' => 'nullable|string|max:255',
            'dob' => 'required|date|before:today',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                new UniqueUserEmail($this->getEntityManager()),
            ],
            'password' => 'required|string|min:8',
            'verified' => 'boolean',
            'timezone' => 'required|string|timezone',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name cannot exceed 255 characters',

            'surName.required' => 'Surname is required',
            'surName.string' => 'Surname must be a string',
            'surName.max' => 'Surname cannot exceed 255 characters',

            'username.required' => 'Username is required',
            'username.string' => 'Username must be a string',
            'username.max' => 'Username cannot exceed 255 characters',
            'username.unique' => 'Username already exists',

            'penName.string' => 'Pen Name must be a string',
            'penName.max' => 'Pen Name cannot exceed 255 characters',
            'penName.unique' => 'Pen Name already exists',

            'dob.required' => 'Date of Birth is required',
            'dob.date' => 'Date of Birth must be a valid date',
            'dob.before' => 'Date of Birth must be before today',

            'email.required' => 'Email is required',
            'email.string' => 'Email must be a string',
            'email.email' => 'Email must be a valid email address',
            'email.max' => 'Email cannot exceed 255 characters',
            'email.unique' => 'Email already exists',

            'password.required' => 'Password is required',
            'password.string' => 'Password must be a string',
            'password.min' => 'Password must be at least 8 characters',

            'verified.boolean' => 'Verified must be a boolean',

            'timezone.required' => 'Timezone is required',
            'timezone.string' => 'Timezone must be a string',
            'timezone.timezone' => 'Timezone must be a valid timezone',
        ];
    }

    /**
     * Get the Doctrine EntityManager instance.
     *
     * @return EntityManagerInterface
     */
    private function getEntityManager(): EntityManagerInterface
    {
         return app(EntityManagerInterface::class);
    }
}

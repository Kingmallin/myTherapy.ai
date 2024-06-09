<?php

namespace App\Http\Response\Therapist;

use App\Models\Therapist\Therapist;

class TherapistResponse {
     /**
     * Transform a single admin.
     *
     * @param Therapist $therapist
     * @return array
     */
    public static function one(Therapist $therapist): array
    {
        return [
            'id' => $therapist->getId(),
            'name' => $therapist->getName(),
            'persona' => $therapist->getPersona(),
            'specialization' => $therapist->getSpecialization(),
            'apiEndPoint' => $therapist->getApiEndpoint(),
            'apiKey' => $therapist->getApiKey(),
            'additionalSettings' => $therapist->getAdditionalSettings()
        ];
    }

    /**
     * Transform multiple therapists.
     *
     * @param array $therapists
     * @return array
     */
    public static function many(array $therapists): array
    {
        $response = [];
        foreach ($therapists as $therapist) {
            $response[] = self::one($therapist);
        }
        return $response;
    }
}

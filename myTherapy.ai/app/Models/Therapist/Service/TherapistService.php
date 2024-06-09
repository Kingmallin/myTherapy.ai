<?php

namespace App\Models\Therapist\Service;

use App\Models\Therapist\Repository\TherapistRepository;
use App\Models\Therapist\Therapist;

class TherapistService {
    public function __construct(private readonly TherapistRepository $repository)
    {}  

    public function update($id, $name, $persona,$specialization, $apiEndpoint,$apiKey, $additionalSettings)
    {
        $therapist = $this->repository->findById($id);
        $therapist->setName($name);
        $therapist->setPersona($persona);
        $therapist->setSpecialization($specialization);
        $therapist->setApiEndpoint($apiEndpoint);
        $therapist->setApiKey($apiKey);
        $therapist->setAdditionalSettings($additionalSettings);
        $this->repository->save($therapist);
        return $this->repository->index();
    }

    public function create(
        $name,
        $persona, 
        $specialization, 
        $apiEndpoint, 
        $apiKey,
        $additionalSettings
        ) {
            
        $this->repository->save(
            new Therapist(
                $name, 
                $persona, 
                $specialization, 
                $apiEndpoint,
                $apiKey, 
                $additionalSettings
            ));

            return $this->repository->index();
    }

    public function delete($id)
    {
        $therapist = $this->repository->findById($id);
        $this->repository->remove($therapist);
        return $this->repository->index();
    }
}

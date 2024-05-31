<?php

namespace App\Http\Controllers\Therapist;

use App\Http\Response\Therapist\TherapistResponse;
use App\Http\Validation\Therapist\NewTherapistValidation;
use App\Http\Validation\Therapist\UpdateTherapistValidation;
use App\Models\Therapist\Repository\TherapistRepository;
use App\Models\Therapist\Service\TherapistService;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;


class TherapistController extends controller 
{
    public function index(TherapistRepository $repository)
    {
        return new Response(TherapistResponse::many(
            $repository->index()
        ));
    }

    public function update(UpdateTherapistValidation $validation, TherapistService $service)
    {
        return new Response(
            TherapistResponse::many(
            $service->update(
            $validation->post('id'),
            $validation->post('name'),
            $validation->post('persona'),
            $validation->post('specialization'),
            $validation->post('apiEndpoint'),
            $validation->post('apiKey'),
            $validation->post('additionalSettings')
            )));
    }

    public function create(NewTherapistValidation $validation, TherapistService $servise)
    {
        return new Response(TherapistResponse::many(
          $servise->create(
            $validation->post('name'),
            $validation->post('persona'),
            $validation->post('specialization'),
            $validation->post('apiEndpoint'),
            $validation->post('encryptedApiKey'),
            $validation->post('additionalSettings')
        )));
    }

    public function delete($id, TherapistService $service)
    {
        return new Response(TherapistResponse::many($service->delete($id)));
    }
}
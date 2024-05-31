<?php

namespace App\Http\Controllers\User;

use App\Enums\SubscriptionLevel;
use App\Enums\UserStatus;
use App\Http\Response\User\NewUserResponse;
use App\Http\Validation\NewUserValidation\NewUserValidation;
use App\Models\User\Authentication\Authentication;
use App\Models\User\Services\UserService;
use Illuminate\Http\Response;

class UserController
{
    /**
     * @param NewUserValidation $request
     * @param UserService $service
     * @return Response
     */
    public function create(NewUserValidation $request, UserService $service): Response
    {
        $ip = $request->ip();

        $timeZone = $request->input('timezone', 'UTC');

        return new Response(NewUserResponse::one($service->create(
            $request->post('name'),
            $request->post('surName'),
            $request->post('username'),
            $request->post('penName'),
            $request->post('dob'),
            $request->post('email'),
            $request->post('password'),
            $request->post('verified', false),
            $ip,
            $timeZone,
            UserStatus::from($request->post('userStatus')),
            SubscriptionLevel::from($request->post('subscriptionLevel'))
        )));
    }

    public function test(Authentication $auth)
    {
        dd($auth);
    }
}

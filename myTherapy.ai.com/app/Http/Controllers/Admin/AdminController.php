<?php

namespace App\Http\Controllers\Admin;

use App\Http\Response\Admin\AdminResponse;
use App\Http\Validation\AdminValidation\LoginValidation;
use App\Models\Admin\Repository\AdminRepository;
use App\Models\Admin\Service\AdminLoginService;
use App\Models\User\Authentication\Authentication;
use App\Models\User\Services\EncryptionService;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminController extends controller
{
    public function login(LoginValidation $validation, AdminLoginService $service, AdminRepository $repository, EncryptionService $encryptionService)
    {
        if ($admin = $repository->getAdminUsernameOrEmail($validation->post('uname'))) {
            if ($service->passwordCheck($validation->post('psw'), $admin)) {
                $token = $encryptionService->encrypt(json_encode(['uuid' => $admin->getUuid()]));
                return response()->json(['login' => 'success', 'token' => $token])->cookie('token', $token);
            }
        }

        return response()->json(['error' => 'Username, Email or password does not match'], 401);
    }

    public function getAdmin(Authentication $authentication): Response
    {
        return new Response(AdminResponse::one($authentication->getAdmin()));
    }
}

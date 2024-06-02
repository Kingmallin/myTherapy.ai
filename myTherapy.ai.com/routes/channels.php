<?php

use App\Models\Admin\Repository\AdminRepository;
use App\Models\User\Repository\UserRepository;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('admin.{uuid}.{therapistId}', function () {

  $uuid = request()->segment(2);
  $therapistId = request()->segment(3);
  $adminRepository = app(AdminRepository::class);

  return !empty($adminRepository->findByUuid($uuid));
});

Broadcast::channel('user.{uuid}.{therapistId}', function (UserRepository $userRepository) {
    $uuid = request()->segment(2);
  
    function validateUserToken(string $uuid, UserRepository $userRepository): bool
    {
      return !empty($userRepository->findByUuid($uuid));
    }
  
    return validateUserToken($uuid, $userRepository);
  });

<?php

namespace App\Models\Ai\Service;

use App\Models\Admin\Repository\AdminRepository;
use App\Models\Ai\AiConversation;
use App\Models\Ai\Repository\AiConversationRepository;
use App\Models\Therapist\Repository\TherapistRepository;
use App\Models\User\Repository\UserRepository;

class AiConversationService 
{
    public function __construct(
        private readonly TherapistRepository $therapistRepository,
        private readonly UserRepository $userRepository,
        private readonly AdminRepository $adminRepository,
        private readonly AiConversationRepository $repository)
    {
    }
    
    public function create($therapistId, $userUuid, $adminUuid, $message, $sender)
    {
        $therapist = $this->therapistRepository->findById($therapistId);
        $user = $this->userRepository->findByUuid($userUuid);
        $admin = $this->adminRepository->findByUuid($adminUuid);
        $aiConversation = new AiConversation($therapist, $user, $admin, $message, $sender);
        $this->repository->save($aiConversation);
    }
}
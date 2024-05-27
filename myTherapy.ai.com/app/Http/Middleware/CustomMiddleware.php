<?php

namespace App\Http\Middleware;

use App\Enums\SubscriptionLevel;
use App\Models\User\Authentication\Authentication;
use App\Models\User\Services\EncryptionService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User\Repository\UserRepository;

class CustomMiddleware
{

    /**
     * @param UserRepository $userRepository
     * @param EncryptionService $encryptionService
     * @param Authentication $authentication
     */
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly EncryptionService $encryptionService,
        private readonly Authentication $authentication
    )
    {
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $inputToken = $request->bearerToken();

        if ($inputToken) {
            $decryptedToken = $this->encryptionService->decrypt($inputToken);
            if (isset($decryptedToken->level) && isset($decryptedToken->uuid)) {

                $user = $this->userRepository->findByUuid($decryptedToken->uuid);

                if ($user) {
                    $this->authentication->setUser($user);

                    return $next($request);
                }
            }
        }

        return response()->json(['error' => 'Not Found'], 404);
    }
}

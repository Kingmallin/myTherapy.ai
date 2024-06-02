<?php

namespace App\Http\Middleware;

use App\Models\Admin\Repository\AdminRepository;
use App\Models\User\Authentication\Authentication;
use App\Models\User\Services\EncryptionService;
use Closure;
use Illuminate\Http\Request;

class AdminAuthentication
{
    public function __construct(
        private readonly AdminRepository $adminRepository,
        private readonly EncryptionService $encryptionService,
        private readonly Authentication $authentication
    ) {}

    public function handle(Request $request, Closure $next)
    {
        $inputToken = $request->bearerToken() ?: $request->cookie('token');
        
        if ($inputToken) {
            $decryptedToken = $this->encryptionService->decrypt($inputToken);
            if (isset($decryptedToken->uuid)) {
                $admin = $this->adminRepository->findByUuid($decryptedToken->uuid);
                if ($admin) {
                    $this->authentication->setAdmin($admin);

                    return $next($request);
                }
            }
        }
        return response()->view('welcome');
    }
}

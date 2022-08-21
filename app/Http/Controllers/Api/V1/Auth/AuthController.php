<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private function createToken($credentials): JsonResponse
    {
        $user = User::where('email',$credentials['email'])->firstOrFail();

        $token = $user->createToken('mobile_app_user_auth_token')->plainTextToken;

        return $this->respondWithToken($token, $user);
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $this->getCredentials($request);

        return $this->createToken($credentials);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json('logout successfully');
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     * @param User $user
     * @return JsonResponse
     */
    protected function respondWithToken(string $token, User $user): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getCredentials(Request $request): array
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);
    }

    public function me(): JsonResponse
    {
        return response()->json([
            'user' => Auth::user()
        ]);
    }
}

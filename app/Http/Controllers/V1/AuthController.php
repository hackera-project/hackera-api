<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Requests\V1\Auth\RegisterRequest;
use App\Http\Resources\V1\Auth\UserResource;
use App\Http\Response;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function me(): JsonResponse
    {
        $user = Auth::user();

        return Response::success(UserResource::make($user));
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::query()->create($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        $role = Role::query()->where('name', $data['role'])->first();

        $user->roles()->attach($role->id);

        return Response::success([
            'token' => $token,
            'role' => $role->name,
        ], message: "Welcome {$user->name}");
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            $user = User::query()->where('email', $data['email'])->first();

            $token = $user->createToken('auth_token')->plainTextToken;
            return Response::success([
                'token' => $token,
                'role' => $user->roles->first()->name,
            ], message: "Welcome {$user->name}");
        }

        return Response::unauthorized();
    }

    public function logout(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();

        return Response::success(message: 'You logged out successfully');
    }
}

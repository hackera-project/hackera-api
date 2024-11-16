<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\UpdateRequest;
use App\Http\Resources\V1\User\ProfileResource;
use App\Http\Response;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function profile(): JsonResponse
    {
        $user = auth()->user();

        return Response::success(ProfileResource::make($user));
    }

    public function updateProfile(UpdateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = auth()->user();

        $user->update($data);

        if (isset($data['logoFile'])) {
            $user->media()
                ->where('collection_name', 'logo')
                ->delete();

            $user->addMediaFromRequest('logoFile')
                ->usingFileName('logo.png')
                ->toMediaCollection('logo');
        }

        return Response::success(message: __('success'));
    }
}

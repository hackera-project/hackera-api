<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Program\StoreRequest;
use App\Http\Resources\V1\Program\ProgramListResource;
use App\Http\Resources\V1\Program\ProgramResource;
use App\Http\Response;
use App\Models\Program;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public function index(): JsonResponse
    {
        $user = Auth::user();
        $role = $user->roles->first()->name;

        $query = match ($role) {
            Role::HACKER => fn ($q) => $q->where('deadline', '>', now()),
            Role::COMPANY_ADMIN => fn ($q) => $q->where('company_id', $user->company_id),
        };

        $programs = Program::query()->where($query)->latest()->paginate();

        return Response::successList($programs, ProgramListResource::class);
    }

    public function show(Program $program): JsonResponse
    {
        return Response::success(ProgramResource::make($program));
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        $program = Program::query()->create($data);

        return Response::success(message: __('response.created', ['subject' => $program->title]));
    }

    public function update(Program $program, StoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        $program->update($data);

        return Response::success(message: __('response.updated', ['subject' => $program->title]));
    }
}

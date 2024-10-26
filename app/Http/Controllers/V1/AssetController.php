<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Asset\StoreRequest;
use App\Http\Resources\V1\Asset\AssetResource;
use App\Http\Response;
use App\Models\Asset;
use App\Models\Program;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(Program $program): JsonResponse
    {
        $assets = Asset::query()
            ->where('program_id', $program->id)
            ->latest()
            ->paginate();

        return Response::successList($assets, AssetResource::class);
    }

    public function store(Program $program, StoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['program_id'] = $program->id;

        Asset::query()->create($data);

        return Response::success(message: __('response.created', ['subject' => __('asset')]));
    }

    public function update(Program $program, Asset $asset, StoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        $asset->update($data);

        return Response::success(message: __('response.updated', ['subject' => __('asset')]));
    }

    public function destroy(Program $program, Asset $asset): JsonResponse
    {
        $asset->delete();

        return Response::success(message: __('response.deleted', ['subject' => __('asset')]));
    }
}

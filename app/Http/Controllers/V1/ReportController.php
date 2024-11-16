<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Report\StoreRequest;
use App\Http\Requests\V1\Report\UpdateRequest;
use App\Http\Resources\V1\Report\ReportListResource;
use App\Http\Resources\V1\Report\ReportResource;
use App\Http\Response;
use App\Models\Report;
use App\Models\Enums\Role\Role;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{
    public function index(): JsonResponse
    {
        $user = auth()->user();
        $role = $user->roles->first()->name;

        $query = match ($role) {
            Role::Hacker => fn ($q) => $q
                ->where('hacker_id', $user->id),

            Role::CompanyAdmin => fn ($q) => $q,
        };

        $reports = Report::query()
            ->with(['hacker:id,name', 'program:id,title,company_id', 'asset:id,asset_value', 'program.company:id,title'])
            ->where($query)
            ->paginate();

        return Response::successList($reports, ReportListResource::class);
    }

    public function show(Report $report): JsonResponse
    {
        $report->load([
            'hacker:id,name',
            'program',
            'feedbacks' => fn ($q) => $q->latest(),
            'feedbacks.user:id,name',
        ]);

        return Response::success(ReportResource::make($report));
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        $data['hacker_id'] = auth()->id();
        Report::query()->create($data);

        return Response::success(message: __('response.created', ['subject' => __('report')]));
    }

    public function update(Report $report, UpdateRequest $request): JsonResponse
    {
        $data = $request->validated();

        $report->update($data);

        return Response::success(message: __('response.updated', ['subject' => __('report')]));
    }
}

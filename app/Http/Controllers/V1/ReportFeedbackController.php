<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ReportFeedback\StoreRequest;
use App\Http\Resources\V1\ReportFeedback\ReportFeedbackResource;
use App\Http\Response;
use App\Models\Report;
use App\Models\ReportFeedback;
use Illuminate\Http\JsonResponse;

class ReportFeedbackController extends Controller
{
    public function index(Report $report): JsonResponse
    {
        $feedbacks = $report->feedbacks;

        return Response::success(ReportFeedbackResource::collection($feedbacks));
    }

    public function store(Report $report, StoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        ReportFeedback::query()->create([
            'user_id' => auth()->id(),
            'report_id' => $report->id,
            'content' => $data['content'],
        ]);

        return Response::success(message: __('response.created', ['subject' => __('feedback')]));
    }
}

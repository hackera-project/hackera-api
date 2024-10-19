<?php

namespace App\Http\Controllers\V1;

use App\Http\Response;
use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Company\StoreRequest;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    public function store(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        $company = Company::query()->create($data);

        return Response::success(['id' => $company->id]);
    }
}

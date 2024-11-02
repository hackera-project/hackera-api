<?php

namespace App\Http\Resources\V1\Report;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'hacker' => $this->hacker,
            'company' => $this->program->company,
            'program' => $this->program,
            'asset' => $this->asset,
            'created_at' => $this->created_at->toDateTimeString(),
            'payment' => $this->payment,
        ];
    }
}

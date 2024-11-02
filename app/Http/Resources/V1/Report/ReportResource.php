<?php

namespace App\Http\Resources\V1\Report;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'reproduce_steps' => $this->reproduce_steps,
            'created_at' => $this->created_at->toDateTimeString(),
            'hacker' => $this->hacker,
            'payment' => $this->payment,
            'status' => $this->status,
            'cve' => $this->cve,
            'cwe' => $this->cwe,
            'severity' => $this->severity,
            'feedbacks' => $this->feedbacks->map(fn ($f) => [
                'id' => $f->id,
                'content' => $f->content,
                'created_at' => $f->created_at->toDateTimeString(),
                'user' => $f->user,
            ]),
        ];
    }
}

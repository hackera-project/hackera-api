<?php

namespace App\Http\Resources\V1\Program;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'type' => $this->type,
            'description' => $this->description,
            'exclusion' => $this->exclusion,
            'deadline' => $this->deadline,
            'status' => $this->status,
            'payments' => $this->payments ?? $this->emptyPayments(),
        ];
    }
}

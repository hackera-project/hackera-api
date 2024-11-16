<?php

namespace App\Http\Resources\V1\Program;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramListResource extends JsonResource
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
            'assets_count' => $this->assets_count,
            'company' => $this->whenLoaded('company', $this->company),
            'logo' => $this->whenLoaded('company', $this->company->getFirstMedia('logo')->getTemporaryUrl(now()->addDay())),
            'assets' => $this->whenLoaded('assets', $this->assets->groupBy('type')->map(fn ($a) => count($a))),
            'payments' => [
                'min' => $this->payments['low_severity']['min'] ?? null,
                'max' => $this->payments['critical_severity']['max'] ?? null,
            ]
        ];
    }
}

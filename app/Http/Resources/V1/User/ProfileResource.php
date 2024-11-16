<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'logo' => $this->getFirstMedia('logo')->getTemporaryUrl(now()->addDay()),
            'website' => $this->website,

            'x' => $this->social_media['x'] ?? '',
            'linkedin' => $this->social_media['linkedin'] ?? '',
            'github' => $this->social_media['github'] ?? '',
            'gitlab' => $this->social_media['gitlab'] ?? '',
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApprehensionResource extends JsonResource
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
            'violator_id' => $this->violator_id,
            'public_conveyance_id' => $this->public_conveyance_id,
            'establishment_id' => $this->establishment_id,
            'violation' => $this->violation,
            'created_at' => $this->created_at,
        ];
    }
}

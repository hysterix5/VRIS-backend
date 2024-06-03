<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'pads_count' => $this->pads_count,
            'tickets_per_pads' => $this->tickets_per_pads,
            'date_issued' => $this->date_issued,
            'issued_by' => $this->issued_by,
            'issued_to' => $this->issued_to,
            'page_from' => $this->page_from,
            'page_to' => $this->page_to,
            'created_at' => $this->created_at,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstablishmentResource extends JsonResource
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
    'name' =>  $this->name,
    'address' =>  $this->address,
    'registered_owner' =>  $this->registered_owner,
    'permit' =>  $this->permit,
    'establishment_type' =>  $this->establishment_type,
    'remarks' =>  $this->remarks,
    'cigarette_type' =>  $this->cigarette_type,
    'apprehending_officer' =>  $this->apprehending_officer,
    'police_station' =>  $this->police_station,
    'encoded_by' =>  $this->encoded_by,
    'date_apprehended' =>  $this->date_apprehended,
    'payment_status' =>  $this->payment_status,
    'created_at' => $this->created_at,
    'apprehension' => new ApprehensionResource($this->whenLoaded('apprehension'))
       ];

    }
}

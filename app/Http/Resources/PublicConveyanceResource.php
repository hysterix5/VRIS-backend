<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicConveyanceResource extends JsonResource
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
            'driver_name' => $this ->driver_name,
            'apprehension_place' =>$this ->apprehension_place,
            'license_no' => $this ->license_no,
            'plate_no' => $this ->plate_no,
            'registered_owner' => $this ->registered_owner,
            'owner_address' => $this ->owner_address,
            'apprehension_type' => $this ->apprehension_type,
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

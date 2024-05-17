<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ViolatorResource extends JsonResource
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
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'suffix' => $this->suffix,
            'sex' => $this->sex,
            'address' => $this->address,
            'birthdate' => $this->birthdate,
            'occupation' => $this->occupation,
            'referenceid' => $this->referenceid,
            'cigarette_type' => $this->cigarette_type,
            'apprehending_officer' =>  $this->apprehending_officer,
            'police_station' =>  $this->police_station,
            'encoded_by' =>  $this->encoded_by,
            'date_apprehended' =>  $this->date_apprehended,
            'remarks' => $this->remarks,
            'payment_status' =>  $this->payment_status,
            'created_at' => $this->created_at,
            'apprehension' => new ApprehensionResource($this->whenLoaded('apprehension'))
        ];
    }
}

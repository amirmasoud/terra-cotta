<?php

namespace App\Http\Resources;

use App\Http\Resources\Safe as SafeResource;
use App\Http\Resources\Field as FieldResource;
use App\Http\Resources\Icon as IconResource;

use Illuminate\Http\Resources\Json\JsonResource;

class Group extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => new SafeResource($this->whenLoaded('icon')),
            'safe' => new SafeResource($this->whenLoaded('safe')),
            'fields' => FieldResource::collection($this->whenLoaded('fields')),
        ];
    }
}

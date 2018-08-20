<?php

namespace App\Http\Resources;

use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\Group as GroupResource;
use App\Http\Resources\Field as FieldResource;

use Illuminate\Http\Resources\Json\JsonResource;

class Icon extends JsonResource
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
            'name' => $this->name,
            'class' => $this->class,
            'markup' => $this->markup,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'groups' => GroupResource::collection($this->whenLoaded('groups')),
            'fields' => FieldResource::collection($this->whenLoaded('fields')),
        ];
    }
}

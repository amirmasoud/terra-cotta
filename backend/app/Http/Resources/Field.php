<?php

namespace App\Http\Resources;

use App\Http\Resources\Type as TypeResource;
use App\Http\Resources\Group as GroupResource;
use App\Http\Resources\Key as KeyResource;
use App\Http\Resources\Icon as IconResource;

use Illuminate\Http\Resources\Json\JsonResource;

class Field extends JsonResource
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
            'label' => $this->label,
            'value' => $this->value,
            'type' => new TypeResource($this->whenLoaded('type')),
            'group' => new TypeResource($this->whenLoaded('group')),
            'key' => new TypeResource($this->whenLoaded('key')),
            'icon' => new TypeResource($this->whenLoaded('icon')),
        ];
    }
}

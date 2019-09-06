<?php

namespace App\Http\Resources;

use App\Http\Resources\Role as RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Permission as PermissionResource;

class User extends JsonResource
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
            'email' => $this->email,
            'photo_url' => $this->photo_url
        ];
    }
}

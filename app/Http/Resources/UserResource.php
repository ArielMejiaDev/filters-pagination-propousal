<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response = [
            'name' => $this->resource->name,
            'email' => $this->resource->email,
        ];

        if(!$request->has('fields')) {
            $response['createdAt'] = optional($this->resource->created_at)->toString();
        }

        if($request->has('append')) {
            $response['name_in_uppercase'] = $this->resource->name_in_uppercase;
        }

        if($request->has('include')) {
            $response['role'] = $this->resource->role;
        }

        return $response;
    }
}

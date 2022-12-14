<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'bread_name' => $this->bread_name,
            'temperament' => $this->temperament,
            'lifespan' => $this->lifespan,
            'avg_weight_female' => $this->avg_weight_female,
            'avg_weight_male' => $this->avg_weight_male,
            'coat_type' => $this->coat_type,
            'coat_density' => $this->coat_density,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

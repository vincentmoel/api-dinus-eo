<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'event_id'      => $this->event_id,
            'room'          => $this->room->name,
            'name'          => $this->name,
            'from_date'     => $this->from_date,
            'until_date'    => $this->until_date,
            'image'         => $this->image,
            'contact'       => $this->contact,
            'description'   => $this->contact,
            'link'          => $this->contact,
        ];
    }
}

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
            'from_date'     => $this->createDateFormat($this->from_date)." WIB",
            'until_date'    => $this->createDateFormat($this->until_date)." WIB",
            'image'         => $this->image,
            'contact'       => $this->contact,
            'description'   => $this->description,
            'link'          => $this->link,
            'category'      => $this->category,
        ];
    }

    public function createDateFormat($date)
    {
        $date = date_create($date);
        return date_format($date,"d F Y H:i");
    }
}

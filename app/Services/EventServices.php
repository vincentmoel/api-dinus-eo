<?php

namespace App\Services;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Support\Str;

class EventServices
{
    public function getAll()
    {
        return Event::get();
    }

    public function saveData(StoreEventRequest $request)
    {
        $Event = Event::create([
            'room_id'       => $request->room_id,
            'borrower_name' => $request->borrower_name,
            'phone'         => $request->phone,
            'from_date'     => date('Y-m-d H:i:s', strtotime($request->from_date)),
            'until_date'    => date('Y-m-d H:i:s', strtotime($request->until_date)),
            'description'   => $request->description,
        ]);
        return $Event ? true : false;
    }

    public function deleteData(Event $Event)
    {
        $Event->delete();
    }

    public function updateData(UpdateEventRequest $request, Event $Event)
    {
        $Event = Event::where('id', $Event->id)->update([
            'room_id'       => $request->room_id,
            'borrower_name' => $request->borrower_name,
            'phone'         => $request->phone,
            'from_date'     => date('Y-m-d H:i:s', strtotime($request->from_date)),
            'until_date'    => date('Y-m-d H:i:s', strtotime($request->until_date)),
            'description'   => $request->description,
        ]);

        return $Event ? true : false;
    }

    public function isAvailable($from_date, $until_date, $room_id, $except_id = 0)
    {
        $from_date = date('Y-m-d H:i:s', strtotime($from_date));
        $until_date = date('Y-m-d H:i:s', strtotime($until_date));

        $Event = Event::where(function ($query) use ($from_date, $until_date) {

            $query->orWhereBetween('from_date', [$from_date, $until_date])
                ->orWhereBetween('until_date', [$from_date, $until_date])
                ->orWhere(function ($query) use ($from_date, $until_date) {
                    $query->where('from_date', '<=', $from_date)
                        ->where('until_date', '>=', $until_date);
                });
        })
            ->where('room_id', $room_id)
            ->where('event_id','!=',$except_id)
            ->get();

        return $Event->count() == 0 ? 'available' : $Event;
    }

    public function getActiveSchedule()
    {
        $Events = Event::where('until_date', '>', date('Y-m-d H:i:s'))->orderBy('from_date', 'asc')->get();
        return $Events;
    }
}

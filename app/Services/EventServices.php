<?php

namespace App\Services;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventServices
{
    public function getAll()
    {
        return Event::get();
    }

    public function saveData(StoreEventRequest $request)
    {
        $event = Event::create([
            'room_id'       => $request->room_id,
            'name'          => $request->name,
            'from_date'     => date('Y-m-d H:i:s', strtotime($request->from_date)),
            'until_date'    => date('Y-m-d H:i:s', strtotime($request->until_date)),
            'image'         => $request->file('image')->store('images'),
            'contact'       => $request->contact,
            'description'   => $request->description,
            'link'          => $request->link,
            'category'      => $request->category,
            'created_by'    => auth()->user()->user_id,
        ]);
        return $event ? true : false;
    }

    public function deleteData(Event $event)
    {
        $event->delete();
    }

    public function updateData(UpdateEventRequest $request, Event $event)
    {
        $image = $request->oldImage;

        if ($request->file('image')) {
            Storage::delete($request->oldImage);
            $image = $request->file('image')->store('images');
        }

        $event = Event::where('event_id', $event->event_id)->update([
            'room_id'       => $request->room_id,
            'name'          => $request->name,
            'from_date'     => date('Y-m-d H:i:s', strtotime($request->from_date)),
            'until_date'    => date('Y-m-d H:i:s', strtotime($request->until_date)),
            'image'         => $image,
            'contact'       => $request->contact,
            'description'   => $request->description,
            'link'          => $request->link,
            'category'      => $request->category,
            'created_by'    => auth()->user()->user_id,
        ]);

        return $event ? true : false;
    }

    public function isAvailable($from_date, $until_date, $room_id, $except_id = 0)
    {
        $from_date = date('Y-m-d H:i:s', strtotime($from_date));
        $until_date = date('Y-m-d H:i:s', strtotime($until_date));

        $event = Event::where(function ($query) use ($from_date, $until_date) {

            $query->orWhereBetween('from_date', [$from_date, $until_date])
                ->orWhereBetween('until_date', [$from_date, $until_date])
                ->orWhere(function ($query) use ($from_date, $until_date) {
                    $query->where('from_date', '<=', $from_date)
                        ->where('until_date', '>=', $until_date);
                });
        })
            ->where('room_id', $room_id)
            ->where('event_id','!=',$except_id)
            ->where('category','offline')
            ->get();

        return $event->count() == 0 ? 'available' : $event;
    }

    public function getActiveSchedule()
    {
        $Events = Event::where('until_date', '>', date('Y-m-d H:i:s'))->orderBy('from_date', 'asc')->get();
        return $Events;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Services\EventServices;
use App\Services\RoomServices;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function __construct()
    {
        $this->eventServices = new EventServices();
        $this->roomServices = new RoomServices();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->eventServices->getAll();
        $rooms = $this->roomServices->getAll();
        return view('event.index', [
            'events'    => $events,
            'rooms'     => $rooms,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $isAvailable = $this->eventServices->isAvailable($request->from_date,$request->until_date,$request->room_id);
        if($isAvailable == 'available')
        {
            $this->eventService->saveData($request);
            return redirect('/events')->with('success', 'Success Save Data');
        }
        else
        {
            $room = $this->roomServices->getRoomById($request->room_id);
            return redirect('/events')->with([
                'error' => "Error : ".$room->name." Collision of dates",
                'data'  => $isAvailable
            ])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}

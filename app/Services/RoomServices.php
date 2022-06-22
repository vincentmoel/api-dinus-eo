<?php

namespace App\Services;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;

class RoomServices{


    public function getAll()
    {
        return Room::get();
    }

    public function getRoomById($id)
    {
        return Room::where('room_id',$id)->first();
    }

    public function saveData(StoreRoomRequest $request)
    {
        $room = Room::create([
            "building_id"   => $request->building_id, 
            "name"          => $request->name,
            "floor"         => $request->floor,
            "created_by"    => auth()->user()->user_id,
        ]);
        return $room ? true : false;
    }

    public function deleteData(Room $room)
    {
        $room->delete();
    }

    public function updateData(UpdateRoomRequest $request, Room $room)
    {
        $room = Room::where('room_id',$room->room_id)->update([
            "building_id"   => $request->building_id, 
            "name"          => $request->name,
            "floor"         => $request->floor,
            "created_by"    => auth()->user()->user_id,
        ]);

        return $room ? true : false;

    }


}
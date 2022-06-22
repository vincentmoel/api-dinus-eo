<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\EventServices;
use App\Services\RoomServices;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->eventServices = new EventServices();
        $this->roomServices = new RoomServices();
    }

    public function index()
    {
        $events_active = $this->eventServices->getActiveSchedule();
        $rooms = $this->roomServices->getAll();
        return view('index',[
            'events_active'  => $events_active,
            'rooms'         => $rooms,
        ]);
    }


    public function date()
    {
        return date('H:i:s');
    }


}

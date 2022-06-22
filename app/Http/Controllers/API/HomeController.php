<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventCollection;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $onGoing = $this->getOnGoing();
        $onOnlineUpcoming = $this->getOnlineUpcoming();
        $onOfflineUpcoming = $this->getOfflineUpcoming();
        $data = array_merge($onGoing,$onOnlineUpcoming,$onOfflineUpcoming);

        return response_format(
            200,
            'success',
            'Success Get Home',
            $data
        );
    }

    public function getOnGoing()
    {
        $getData = Event::where('from_date','<',date('Y-m-d H:i:s'))
            ->where('until_date','>',date('Y-m-d H:i:s'))
            ->orderBy('from_date', 'desc')->get();
        dd($getData);
        return ['on_going' => new EventCollection($getData)];
    }

    public function getOnlineUpcoming()
    {
        $getData = Event::where('from_date','>',date('Y-m-d H:i:s'))
                    ->where('category','online')
                    ->orderBy('from_date', 'desc')->get();
        return ['online_upcoming' => new EventCollection($getData)];

    }

    public function getOfflineUpcoming()
    {
        $getData = Event::where('from_date','>',date('Y-m-d H:i:s'))
                    ->where('category','offline')
                    ->orderBy('from_date', 'desc')->get();
        return ['offline_upcoming' => new EventCollection($getData)];
    }
}

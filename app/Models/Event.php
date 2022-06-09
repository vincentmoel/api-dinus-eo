<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'event_id';

    protected $guarded  = ['event_id'];
    protected $with     = ['room'];


    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

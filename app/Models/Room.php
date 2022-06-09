<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'room_id';


    protected $guarded = ['room_id'];

    public function building()
    {
        return $this->belongsTo(Building::class,'building_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

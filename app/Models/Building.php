<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use SoftDeletes;
    
    protected $primaryKey = 'building_id';
    protected $with = ['user'];
    protected $guarded = ['building_id'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}

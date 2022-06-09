<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            "building_id"   => 1,
            "name"          => "H.5.1",
            "floor"         => "5",
            "created_by"    => 1
        ]);
    }
}

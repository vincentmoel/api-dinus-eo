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
            "name"          => "Zoom",
            "floor"         => "1",
            "created_by"    => 1
        ]);
        Room::create([
            "building_id"   => 1,
            "name"          => "Google Meet",
            "floor"         => "1",
            "created_by"    => 1
        ]);
        Room::create([
            "building_id"   => 9,
            "name"          => "H.5.1",
            "floor"         => "5",
            "created_by"    => 1
        ]);
        Room::create([
            "building_id"   => 9,
            "name"          => "H.5.2",
            "floor"         => "5",
            "created_by"    => 1
        ]);
        Room::create([
            "building_id"   => 9,
            "name"          => "H.5.3",
            "floor"         => "5",
            "created_by"    => 1
        ]);
        Room::create([
            "building_id"   => 4,
            "name"          => "D.2.4",
            "floor"         => "2",
            "created_by"    => 1
        ]);
    }
}

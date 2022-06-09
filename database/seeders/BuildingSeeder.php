<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Building::create([
            "name"          => "Gedung H",
            "created_by"    => 1
        ]);
        Building::create([
            "name"          => "Gedung G",
            "created_by"    => 1
        ]);
        Building::create([
            "name"          => "Gedung E",
            "created_by"    => 1
        ]);
    }
}

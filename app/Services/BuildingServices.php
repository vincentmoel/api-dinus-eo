<?php 

namespace App\Services;

use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\Models\Building;

class BuildingServices{


    public function getAll()
    {
        return Building::get();
    }

    public function saveData(StoreBuildingRequest $request)
    {
        $building = Building::create([
            "name"          => $request->name,
            "created_by"    => auth()->user()->user_id
        ]);
        return $building ? true : false;
    }

    public function deleteData(Building $building)
    {
        $building->delete();
    }

    public function updateData(UpdateBuildingRequest $request, Building $building)
    {
        $building = Building::where('building_id',$building->building_id)->update([
            'name' => $request->name
        ]);

        return $building ? true : false;

    }


}


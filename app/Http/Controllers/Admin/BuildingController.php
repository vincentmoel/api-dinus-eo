<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\Models\Building;
use App\Services\BuildingServices;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BuildingServices $buildingServices)
    {
        $buildings = $buildingServices->getAll();
        return view('building.index',[
            "buildings" => $buildings
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBuildingRequest $request, BuildingServices $buildingServices)
    {
        $saveData = $buildingServices->saveData($request);
        return redirect('/buildings')->with('success', 'Success Save Data');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        return view('building.edit',[
            'building' => $building
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBuildingRequest $request, Building $building, BuildingServices $buildingServices)
    {
        $buildingServices->updateData($request,$building);
        return redirect('/buildings')->with('success', 'Success Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building, BuildingServices $buildingServices)
    {
        $buildingServices->deleteData($building);
        return redirect('/buildings')->with('success', 'Success Delete Data');

    }
}

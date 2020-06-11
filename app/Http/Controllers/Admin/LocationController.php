<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $locations = Location::all();
        return  view('pages.location.location', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.location.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $location = new Location();
        $location->locationName = $request->locationName;
        $location->locationAbout = $request->locationAbout;
        $location->locationPhoto = $request->locationPhoto;
        $location->blob = $request->blob;
        $location->active = $request->active;
        $location->save();

        return redirect()->route('admin.location.index')->with('success', 'Location added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('pages.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {

        $location->locationName = $request->locationName;
        $location->locationAbout = $request->locationAbout;
        $location->locationPhoto = $request->locationPhoto;
        $location->blob = $request->blob;
        $location->active = $request->active;
        $location->save();

        return redirect()->route('admin.location.index')->with('success', 'Location updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return response()->json(['success'=>$location]);
    }
}

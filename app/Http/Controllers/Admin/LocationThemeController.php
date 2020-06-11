<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\LocationTheme;
use App\Models\Theme;
use Illuminate\Http\Request;

class LocationThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all();
        $locations = Location::all();
        $locationThemes = LocationTheme::all();
        return  view('pages.location-theme.location-theme', compact('locations','locationThemes','themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $locationTheme = new LocationTheme();
        $locationTheme->location_id = $request->location_id;
        $locationTheme->theme_id = $request->theme_id;
        $locationTheme->save();

        return  back()->with(['success'=>'A new Item added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocationTheme  $locationTheme
     * @return \Illuminate\Http\Response
     */
    public function show(LocationTheme $locationTheme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocationTheme  $locationTheme
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $locationTheme = LocationTheme::find($id);
        $locations = Location::all();
        $themes = Theme::all();
        return  view('pages.location-theme.edit', compact('locationTheme','locations','themes'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocationTheme  $locationTheme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $locationTheme = LocationTheme::find($id);

        $locationTheme->location_id = $request->location_id;
        $locationTheme->theme_id = $request->theme_id;
        $locationTheme->save();

        return  back()->with(['success'=>'A new Item updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationTheme  $locationTheme
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LocationTheme::destroy($id);
        return  response()->json(['success'=>$id]);
    }
}

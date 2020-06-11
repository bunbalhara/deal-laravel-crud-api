<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialdate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Version;

class SpecialdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialDates = Specialdate::all();
        return  view('pages.special-date.special-date', compact('specialDates'));
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
        $specialDate = new Specialdate();

        $specialDate->name = $request->name;
        $specialDate->active = $request->active;
        $specialDate->to_date = date('Y-m-d',strtotime($request->to_date));
        $specialDate->from_date = Carbon::parse($request->from_date)->format('Y-m-d');

        $specialDate->save();

        return back()->with(['success'=>'New item added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialdate  $specialdate
     * @return \Illuminate\Http\Response
     */
    public function show(Specialdate $specialdate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialdate  $specialdate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialDate = Specialdate::find($id);
        return view('pages.special-date.edit', compact('specialDate'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialdate  $specialdate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $specialDate = Specialdate::find($id);

        $specialDate->name = $request->name;
        $specialDate->to_date = date('Y-m-d',strtotime($request->to_date));
        $specialDate->from_date = Carbon::parse($request->from_date)->format('Y-m-d');
        $specialDate->active = $request->active;
        $specialDate->save();

        return back()->with(['success'=>'New item updated successfully!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialdate  $specialdate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Specialdate::destroy($id);

        return response()->json(['success'=>$id]);
    }
}

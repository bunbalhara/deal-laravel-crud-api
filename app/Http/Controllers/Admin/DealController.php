<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Location;
use App\Models\LocationTheme;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $deals = Deal::all();
        $locations = Location::all();

        return  view('pages.deal.deal', compact('deals','locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return  view('pages.deal.add', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deal = new Deal();

        $deal->location_id = $request->location_id;
        $deal->outboundDate =date('Y-m-d',strtotime($request->outboundDate));
        $deal->inboundDate = date('Y-m-d',strtotime($request->inboundDate));
        $deal->price = $request->price;
        $deal->packageDeeplinkUrl = $request->packageDeeplinkUrl;
        $deal->hotelName = $request->hotelName;
        $deal->hotelRoomBoard = $request->hotelRoomBoard;
        $deal->hotelTrustYouReviewsReviewCount = $request->hotelTrustYouReviewsReviewCount;
        $deal->hotelTrustYouReviewsReviewScore = $request->hotelTrustYouReviewsReviewScore;
        $deal->hotelTrustYouReviewsImageUrl = $request->hotelTrustYouReviewsImageUrl;
        $deal->hotelDefaultImg = $request->hotelDefaultImg;
        $deal->flightDataTakeoffHour = $request->flightDataTakeoffHour;
        $deal->flightDataLandingHour = $request->flightDataLandingHour;
        $deal->flightDataTravelDurationFormat = $request->flightDataTravelDurationFormat;
        $deal->flightDataNbEscales = $request->flightDataNbEscales;
        $deal->flightDataCityFromAirportCode = $request->flightDataCityFromAirportCode;
        $deal->flightDataCityToAirportCode = $request->flightDataCityToAirportCode;
        $deal->flightDataInboundTakeoffHour = $request->flightDataInboundTakeoffHour;
        $deal->flightDataInboundLandingHour = $request->flightDataInboundLandingHour;
        $deal->flightDataInboundTravelDurationFormat = $request->flightDataInboundTravelDurationFormat;
        $deal->flightDataInboundCityFromAirportCode = $request->flightDataInboundCityFromAirportCode;
        $deal->flightDataInboundCityToAirportCode = $request->flightDataInboundCityToAirportCode;
        $deal->active = $request->active;

        $deal->save();

        return redirect()->route('admin.deal.index')->with(['success'=>'New deal added successfully!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        $locations = Location::all();
        return view('pages.deal.edit', compact('deal', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deal $deal)
    {
        $deal->location_id = $request->location_id;
        $deal->outboundDate =date('Y-m-d',strtotime($request->outboundDate));
        $deal->inboundDate = date('Y-m-d',strtotime($request->inboundDate));
        $deal->price = $request->price;
        $deal->packageDeeplinkUrl = $request->packageDeeplinkUrl;
        $deal->hotelName = $request->hotelName;
        $deal->hotelRoomBoard = $request->hotelRoomBoard;
        $deal->hotelTrustYouReviewsReviewCount = $request->hotelTrustYouReviewsReviewCount;
        $deal->hotelTrustYouReviewsReviewScore = $request->hotelTrustYouReviewsReviewScore;
        $deal->hotelTrustYouReviewsImageUrl = $request->hotelTrustYouReviewsImageUrl;
        $deal->hotelDefaultImg = $request->hotelDefaultImg;
        $deal->flightDataTakeoffHour = $request->flightDataTakeoffHour;
        $deal->flightDataLandingHour = $request->flightDataLandingHour;
        $deal->flightDataTravelDurationFormat = $request->flightDataTravelDurationFormat;
        $deal->flightDataNbEscales = $request->flightDataNbEscales;
        $deal->flightDataCityFromAirportCode = $request->flightDataCityFromAirportCode;
        $deal->flightDataCityToAirportCode = $request->flightDataCityToAirportCode;
        $deal->flightDataInboundTakeoffHour = $request->flightDataInboundTakeoffHour;
        $deal->flightDataInboundLandingHour = $request->flightDataInboundLandingHour;
        $deal->flightDataInboundTravelDurationFormat = $request->flightDataInboundTravelDurationFormat;
        $deal->flightDataInboundCityFromAirportCode = $request->flightDataInboundCityFromAirportCode;
        $deal->flightDataInboundCityToAirportCode = $request->flightDataInboundCityToAirportCode;
        $deal->active = $request->active;

        $deal->save();

        return redirect()->route('admin.deal.index')->with(['success'=>'New deal updated successfully!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();
        return  response()->json(['success'=>$deal]);
    }

    public function importJson(){
        $locations = Location::all();
        return view('pages.deal.from-json', compact('locations'));
    }

    public function saveJson(Request $request){

        $deal = new Deal();

        $deal->location_id = $request->location_id;
        $deal->outboundDate =date('Y-m-d',strtotime(convertToStandardDate($request->outboundDate)));
        $deal->inboundDate = date('Y-m-d',strtotime(convertToStandardDate($request->inboundDate)));
        $deal->price = $request->price;
        $deal->packageDeeplinkUrl = $request->packageDeeplinkUrl;
        $deal->hotelName = $request->hotelName;
        $deal->hotelRoomBoard = $request->hotelRoomBoard;
        $deal->hotelTrustYouReviewsReviewCount = $request->hotelTrustYouReviewsReviewCount;
        $deal->hotelTrustYouReviewsReviewScore = $request->hotelTrustYouReviewsReviewScore;
        $deal->hotelTrustYouReviewsImageUrl = $request->hotelTrustYouReviewsImageUrl;
        $deal->hotelDefaultImg = $request->hotelDefaultImg;
        $deal->flightDataTakeoffHour = $request->flightDataTakeoffHour;
        $deal->flightDataLandingHour = $request->flightDataLandingHour;
        $deal->flightDataTravelDurationFormat = $request->flightDataTravelDurationFormat;
        $deal->flightDataNbEscales = $request->flightDataNbEscales;
        $deal->flightDataCityFromAirportCode = $request->flightDataCityFromAirportCode;
        $deal->flightDataCityToAirportCode = $request->flightDataCityToAirportCode;
        $deal->flightDataInboundTakeoffHour = $request->flightDataInboundTakeoffHour;
        $deal->flightDataInboundLandingHour = $request->flightDataInboundLandingHour;
        $deal->flightDataInboundTravelDurationFormat = $request->flightDataInboundTravelDurationFormat;
        $deal->flightDataInboundCityFromAirportCode = $request->flightDataInboundCityFromAirportCode;
        $deal->flightDataInboundCityToAirportCode = $request->flightDataInboundCityToAirportCode;
        $deal->active = $request->active;

        $deal->save();

        return response()->json(['success'=>$request->all()]);
    }
}

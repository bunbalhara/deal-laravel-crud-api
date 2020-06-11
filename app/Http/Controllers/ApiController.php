<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Location;
use App\Models\LocationTheme;
use App\Models\Specialdate;
use Illuminate\Support\Carbon;

class ApiController extends Controller
{
    public function deals(){
        $response = ['specialDates'=>[], "items"=>[]];
        $specialDates = Specialdate::where('active', true)->get();
        foreach ($specialDates as $date){
            array_push($response['specialDates'], [
                "name"=> $date->name,
                "from_date"=>date('d/m/Y',strtotime($date->from_date)),
                "to_date"=>date('d/m/Y', strtotime($date->to_date)),
            ]);
        }

        $locations = Location::where('active', true)->get();

        foreach ($locations  as $i => $location) {
            $deals = Deal::where('location_id', $location->id)
                ->where('active', true)
                ->where('outboundDate', '>=', Carbon::now()->toDateString())
                ->where('inboundDate', '>=', Carbon::now()->toDateString())
                ->get();

            $themes = LocationTheme::where('location_id', $location->id)->get();

            if(count($deals) == 0){
                continue;
            }

            array_push($response['items'],[
                'cityId'=>$location->id,
                'cityName'=>$location->locationName,
                'cityPhoto'=>$location->locationPhoto,
                'locationAbout'=>$location->locationAbout,
                'locationAdvice'=>$location->blob,
                'themes'=>[],
                'deals'=>[],
            ]);

            foreach ($themes as $theme) {
                $response['items'][$i]['themes'][$theme->theme->id]=$theme->theme->name;
            }


            foreach ($deals as $deal){

                array_push($response['items'][$i]['deals'],[
                   'dealData'=>[
                       'dealId'=>$deal->id,
                       'outboundDate'=>date('d/m/Y', strtotime($deal->outboundDate)),
                       'inboundDate'=>date('d/m/Y', strtotime($deal->inboundDate)),
                       'price'=>$deal->price,
                       'packageDeeplinkUrl'=>$deal->packageDeeplinkUrl,
                   ],
                    'hotelData'=>[
                        'name'=>$deal->hotelName,
                        'board'=>$deal->hotelRoomBoard,
                        'rating'=>4,
                        'trustYouReviews'=>[
                            'reviewCount'=>$deal->hotelTrustYouReviewsReviewCount,
                            'reviewScore'=>$deal->hotelTrustYouReviewsReviewScore,
                            'imageUrl'=>$deal->hotelTrustYouReviewsImageUrl,
                        ],
                        'default_img'=>[
                            'cdn'=>'',
                            'url_medium'=>$deal->hotelDefaultImg
                        ],
                        'trustYouReviews.reviewScore'=>0,
                    ],
                    'flightData'=>[
                        "takeoff_hour"=>$deal->flightDataTakeoffHour,
                        "landing_hour"=>$deal->flightDataLandingHour,
                        "travel_duration_format"=>$deal->flightDataTravelDurationFormat,
                        "comp_logo"=>"air_company/UX_mini.png",
                        "comp_path"=>"https://d16tr0byigrcd.cloudfront.net/travelcheck/images/sfMedia/active/",
                        "nb_escales"=> $deal->flightDataNbEscales,
                        "city_from_airport_code"=>$deal->flightDataCityFromAirportCode,
                        "city_to_airport_code"=>$deal->flightDataCityToAirportCode,
                        "default_inbound"=>[
                            "takeoff_hour"=>$deal->flightDataInboundTakeoffHour,
                            "landing_hour"=>$deal->flightDataInboundLandingHour,
                            "travel_duration_format"=>$deal->flightDataInboundTravelDurationFormat,
                            "comp_logo"=> "air_company/UX_mini.png",
                            "comp_path"=>"https://d16tr0byigrcd.cloudfront.net/travelcheck/images/sfMedia/active/",
                            "city_from_airport_code"=> $deal->flightDataInboundCityFromAirportCode,
                            "city_to_airport_code"=> $deal->flightDataInboundCityToAirportCode
                        ]
                    ]
                ]);
            }
        }

        return response()->json($response);
    }
}

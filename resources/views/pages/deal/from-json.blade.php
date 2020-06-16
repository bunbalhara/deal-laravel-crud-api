@extends('layouts.admin')
@section('style')
@endsection
@section('content')
    <div class="card sale-card mt-3">
        <div class="card-header bg-info text-white">
            <h5>Past here JSON string</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="form-group">
                        <label>Location</label>
                        <select class="form-control" name="location_id" id="location">
                            @foreach($locations as $location)
                                <option value="{{$location->id}}">{{$location->locationName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <code>
                       <textarea style="width: 100%; min-height: 450px; border: solid 1px grey; outline: none; padding: 10px" name="json" id="json-area"></textarea>
                    </code>
                </div>
            </div>
            <hr />
            <a href="{{route('admin.deal.index')}}" class="btn btn-danger btn-sm" > Back </a>
            <button type="submit" class="btn btn-primary btn-sm add-deal-submit-btn"> Continue </button>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.add-deal-submit-btn').click(function () {
            try{
                let json = JSON.parse($('#json-area').val());
                console.log(json)
                if(json.dealData && json.flightData && json.hotelData){
                    let formData = new FormData();
                    formData.append('location_id',$('#location').val());
                    formData.append('outboundDate',json.dealData.outboundDate);
                    formData.append('inboundDate',json.dealData.inboundDate);
                    formData.append('price',json.dealData.price);
                    formData.append('packageDeeplinkUrl',json.dealData.packageDeeplinkUrl);
                    formData.append('hotelName',json.hotelData.name);
                    formData.append('hotelRoomBoard',json.hotelData.board);
                    formData.append('hotelTrustYouReviewsReviewCount',json.hotelData.trustYouReviews.reviewCount);
                    formData.append('hotelTrustYouReviewsReviewScore',json.hotelData.trustYouReviews.reviewScore);
                    formData.append('hotelTrustYouReviewsImageUrl',json.hotelData.trustYouReviews.imageUrl);
                    formData.append('hotelDefaultImg',json.hotelData.default_img.url_medium);
                    formData.append('flightDataTakeoffHour',json.flightData.takeoff_hour);
                    formData.append('flightDataLandingHour',json.flightData.landing_hour);
                    formData.append('flightDataTravelDurationFormat',json.flightData.travel_duration_format);
                    formData.append('flightDataNbEscales',json.flightData.nb_escales);
                    formData.append('flightDataCityFromAirportCode',json.flightData.city_from_airport_code);
                    formData.append('flightDataCityToAirportCode',json.flightData.city_to_airport_code);
                    formData.append('flightDataInboundTakeoffHour',json.flightData.default_inbound.takeoff_hour);
                    formData.append('flightDataInboundLandingHour',json.flightData.default_inbound.landing_hour);
                    formData.append('flightDataInboundTravelDurationFormat',json.flightData.default_inbound.travel_duration_format);
                    formData.append('flightDataInboundCityFromAirportCode',json.flightData.default_inbound.city_from_airport_code);
                    formData.append('flightDataInboundCityToAirportCode',json.flightData.default_inbound.city_to_airport_code);
                    formData.append('active','1');

                    $.ajax({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type:'post',
                        url:'/admin/import-deal/post-json',
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType:false,
                        success: function (res) {
                            console.log(res)
                            toastr.success('Successfuly Saved')
                            setTimeout(function () {
                                window.location.href = '/admin/deal'
                            }, 1000)
                        },
                        error: function (err) {
                            console.log(err)
                        }
                    })
                }else{
                    toastr.error('Invalid data')
                }
            }catch(error){
                toastr.error('Type a valid JSON string')
            }
        })
    </script>
@endsection

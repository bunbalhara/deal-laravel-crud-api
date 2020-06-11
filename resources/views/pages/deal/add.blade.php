@extends('layouts.admin')
@section('style')
@endsection
@section('content')
    <div class="card sale-card mt-3">
        <div class="card-header bg-info text-white">
            <h5>Creat New Deal</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.deal.store')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Location</label>
                            <select class="form-control" name="location_id">
                                @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->locationName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Out Bound Date</label>
                            <input type="text" name="outboundDate" class="form-control date" data-toggle="date-picker"   data-single-date-picker="true" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>In Bound Date</label>
                            <input type="text" name="inboundDate" class="form-control date" data-toggle="date-picker" data-single-date-picker="true" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" min="0" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Package Deep Link URL</label>
                            <input type="text" name="packageDeeplinkUrl" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Hotel Name</label>
                            <input type="text" name="hotelName" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Hotel Room Board</label>
                            <input type="text" name="hotelRoomBoard" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Hotel Trust You Review Count</label>
                            <input type="number" name="hotelTrustYouReviewsReviewCount" class="form-control" min="0" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Hotel Trust You Review Score</label>
                            <input type="number" step="any"  name="hotelTrustYouReviewsReviewScore" class="form-control" min="0" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Hotel Trust You Reviews Image URL</label>
                            <input type="text" name="hotelTrustYouReviewsImageUrl" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Hotel Default Image</label>
                            <input type="text" name="hotelDefaultImg" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Flight Data Take Off Hour</label>
                            <input type="text" name="flightDataTakeoffHour" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Flight Data Landing Hour</label>
                            <input type="text" name="flightDataLandingHour" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Flight Data Travel Duration Format</label>
                            <input type="text" name="flightDataTravelDurationFormat" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Flight Data Nb Escales</label>
                            <input type="number" name="flightDataNbEscales" class="form-control" min="0" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Flight Data City From Airport Code</label>
                            <input type="text" name="flightDataCityFromAirportCode" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Flight Data City To Airport Code</label>
                            <input type="text" name="flightDataCityToAirportCode" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Flight Data In Bound Take Off Hour</label>
                            <input type="text" name="flightDataInboundTakeoffHour" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Flight Data In Bound Landing Hour</label>
                            <input type="text" name="flightDataInboundLandingHour" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Flight Data In Bound Travel Duration Format</label>
                            <input type="text" name="flightDataInboundTravelDurationFormat" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Flight Data In Bound City From Airport Code</label>
                            <input type="text" name="flightDataInboundCityFromAirportCode" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Flight Data In Bound City To Airport Code</label>
                            <input type="text" name="flightDataInboundCityToAirportCode" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label>Active</label>
                            <select class="form-control" name="active">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr />
                <a href="{{route('admin.deal.index')}}" class="btn btn-danger btn-sm" > Back </a>
                <button type="submit" class="btn btn-primary btn-sm"> Add </button>
            </form>
        </div>
    </div>
@endsection

@section('script')

@endsection

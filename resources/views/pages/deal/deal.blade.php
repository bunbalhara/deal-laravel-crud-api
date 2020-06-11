@extends('layouts.admin')
@section('style')

@endsection
@section('content')
    <div class="card sale-card mt-3">
        <div class="card-header text-center d-flex justify-content-end">
            <div class="d-flex justify-content-end col-6"><h4>Deals Table</h4></div>
            <div class="d-flex justify-content-end col-6"><a  href="{{route('admin.deal.create')}}" class="btn btn-primary" ><i style="font-size:16px;" class="ion ion-md-add"></i>&nbsp;&nbsp;Add New Deal</a></div>
        </div>
        <div class="col-12 mt-3 mb-3 table-responsive p-3" >
            <div class="col-lg-4 col-md-6 col-12" style="display: flex; justify-content: space-around">
                <div class="form-group">
                    <label>Filter By Location</label>
                    <select class="form-control" id="location">
                        <option value=""}>All Location</option>
                        @foreach($locations as $location)
                            <option value="{{$location->locationName}}"}>{{$location->locationName}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Filter By Active</label>
                    <select class="form-control" id="active">
                        <option value=""}>All</option>
                        <option value="Yes"}>Active</option>
                        <option value="No"}>Inactive</option>
                    </select>
                </div>
            </div>
            <hr/>
            <table class="table dt-responsive table-bordered nowrap" id="deal-table">

                <thead>
                    <tr>
                        <th style="width: 5%">id</th>
                        <th style="width: 5%">Location Name</th>
                        <th style="width: 5%">Out Bound Date</th>
                        <th style="width: 5%">In Bount Date</th>
                        <th style="width: 5%">Price</th>
                        <th style="width: 5%">Hotel Name</th>
                        <th style="width: 5%">Hotel RoomBoard</th>
                        <th style="width: 5%">Hotel Trust You Review Count</th>
                        <th style="width: 5%" >Active</th>
                        <th>Hotel Trust You Review Score</th>
                        <th>hotelTrustYouReviewsImageUrl</th>
                        <th>hotelDefaultImg</th>
                        <th>flightDataTakeoffHour</th>
                        <th>flightDataLandingHour</th>
                        <th>flightDataTravelDurationFormat</th>
                        <th>flightDataNbEscales</th>
                        <th>flightDataCityFromAirportCode</th>
                        <th>flightDataCityToAirportCode</th>
                        <th>flightDataInboundTakeoffHour</th>
                        <th>flightDataInboundLandingHour</th>
                        <th>flightDataInboundTravelDurationFormat</th>
                        <th>flightDataInboundCityFromAirportCode</th>
                        <th>flightDataInboundCityToAirportCode</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($deals))
                    @foreach($deals as $deal)
                        <tr>
                            <td>{{$deal->id}}</td>
                            <td>{{$deal->location->locationName}}</td>
                            <td style="background-color: {{time()>strtotime($deal->outboundDate)?'yellow':'transparent'}}" >{{$deal->outboundDate}}</td>
                            <td style="background-color: {{time()>strtotime($deal->inboundDate)?'yellow':'transparent'}}">{{$deal->inboundDate}}</td>
                            <td>{{$deal->price}}</td>
                            <td>{{$deal->hotelName}}</td>
                            <td>{{$deal->hotelRoomBoard}}</td>
                            <td>{{$deal->hotelTrustYouReviewsReviewCount}}</td>
                            <td>
                                @if($deal->active)
                                    <span class="badge badge-success">Active</span>
                                    <span hidden>Yes</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                    <span hidden>No</span>
                                @endif
                            </td>
                            <td>{{$deal->hotelTrustYouReviewsReviewScore}}</td>
                            <td>{{$deal->hotelTrustYouReviewsImageUrl}}</td>
                            <td>{{$deal->hotelDefaultImg}}</td>
                            <td>{{$deal->flightDataTakeoffHour}}</td>
                            <td>{{$deal->flightDataLandingHour}}</td>
                            <td>{{$deal->flightDataTravelDurationFormat}}</td>
                            <td>{{$deal->flightDataNbEscales}}</td>
                            <td>{{$deal->flightDataCityFromAirportCode}}</td>
                            <td>{{$deal->flightDataCityToAirportCode}}</td>
                            <td>{{$deal->flightDataInboundTakeoffHour}}</td>
                            <td>{{$deal->flightDataInboundLandingHour}}</td>
                            <td>{{$deal->flightDataInboundTravelDurationFormat}}</td>
                            <td>{{$deal->flightDataInboundCityFromAirportCode}}</td>
                            <td>{{$deal->flightDataInboundCityToAirportCode}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm text-white" href="{{route('admin.deal.edit', $deal->id)}}"><i class="feather icon-edit"></i> Edit</a>
                                <a class="btn btn-danger btn-sm text-white delete-deal-btn" data-deal-id="{{$deal->id}}"><i class="feather icon-trash-2"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="25" class="text-center">No data</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <div id="deleteModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" style="display: none" aria-modal="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Delete Deal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body text-center">
                    <h5 class="mt-0">Are you really delete it?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="delete-confirm-btn" type="button" data-dismiss="modal" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        @if(count($deals)>0)
            $('#deal-table').DataTable({
                initComplete: function () {
                    this.api().columns().every( function (index) {
                        var that = this;
                        $( '#location').on( 'keyup change clear', function () {
                            if(index === 1){
                                if ( that.search() !== $(this).val() ) {
                                    that.search($(this).val()).draw();
                                }
                            }
                        })
                        $( '#active').on( 'change', function () {
                            if(index === 8){
                                if ( that.search() !== $(this).val() ) {
                                    that.search($(this).val()).draw();
                                }
                            }
                        });
                    } );
                }
            });
        @endif
        let dealId;
        let deal;
        $(document).on('click','.delete-deal-btn', function (e){
            e.preventDefault();
            deal = $(this).parents('tr');
            dealId = $(this).data('deal-id');
            $('#deleteModel').modal('show');
            console.log(locationId)
        })

        $('#delete-confirm-btn').click(function () {
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type:'DELETE',
                url:`/admin/deal/${dealId}`,
                success:function (res) {
                    console.log(res);
                    deal.remove();
                },
                error:function (error) {
                    console.log(error)
                }
            })
        })
    </script>
@endsection

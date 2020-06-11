@extends('layouts.admin')
@section('style')
@endsection
@section('content')

    <div class="card sale-card mt-3">
        <div class="card-header text-center d-flex justify-content-end">
            <div class="d-flex justify-content-end col-6"><h4>Location Table</h4></div>
            <div class="d-flex justify-content-end col-6"><a  href="{{route('admin.location.create')}}"  class="btn btn-primary" ><i style="font-size:16px;" class="ion ion-md-add"></i>&nbsp;&nbsp;Add New Location</a></div>
        </div>
        <div class="col-12 mt-3 mb-3  table-responsive ">

            <div class="col-lg-4 col-md-6 col-12" style="display: flex">
                <div class="form-group">
                    <label>Filter By Active</label>
                    <select class="form-control" id="active">
                        <option value=""}>All</option>
                        <option value="Yes"}>Active</option>
                        <option value="No"}>Inactive</option>
                    </select>
                </div>
            </div>

            <table class="table table-bordered dt-responsive full-width" id="location-table">

                <thead>
                    <tr>
                        <th width="5%">id</th>
                        <th width="30%">Location Name</th>
                        <th width="40%">Location About</th>
                        <th width="20%">Location Photo</th>
                        <th width="10%">Active</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($locations))
                        @foreach($locations as $location)
                            <tr>
                                <td>{{$location->id}}</td>
                                <td>{{$location->locationName}}</td>
                                <td>{{$location->locationAbout}}</td>
                                <td>
                                    <a href="{{$location->locationPhoto}}" target="_blank">{{ Str::limit($location->locationPhoto, 60)}}</a>
                                </td>
                                <td>
                                    @if($location->active)
                                        <span class="badge badge-success">Active</span>
                                        <span hidden>Yes</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                        <span hidden>No</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.location.edit',$location->id)}}" class="btn btn-primary btn-sm text-white edit-location-btn"><i class="feather icon-edit"></i> Edit</a>
                                    <a class="btn btn-danger btn-sm text-white delete-location-btn" data-location-id="{{$location->id}}"><i class="feather icon-trash-2"></i>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">No data</td>
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
                    <h4 class="modal-title" id="danger-header-modalLabel">Delete Location</h4>
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
        $(document).ready(function() {

            @if(count($locations)>0)
                $('#location-table').DataTable({
                    initComplete: function () {
                        this.api().columns().every( function (index) {
                            var that = this;
                            $( '#active').on( 'change', function () {
                                if(index === 4){
                                    if ( that.search() !== $(this).val() ) {
                                        that.search($(this).val()).draw();
                                    }
                                }
                            });
                        } );
                    }
                });
            @endif

            let locationId;
            let location;
            $(document).on('click','.delete-location-btn', function (){
                location = $(this).parents('tr');
                locationId = $(this).data('location-id');
                $('#deleteModel').modal('show');
                console.log(locationId)
            })

            $('#delete-confirm-btn').click(function () {
                $.ajax({
                    headers:{
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type:'DELETE',
                    url:`/admin/location/${locationId}`,
                    success:function (res) {
                        console.log(res);
                        location.remove();
                    },
                    error:function (error) {
                        console.log(error)
                    }
                })
            })
        });
    </script>
@endsection

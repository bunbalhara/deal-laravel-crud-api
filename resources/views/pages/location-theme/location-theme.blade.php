@extends('layouts.admin')
@section('style')
@endsection
@section('content')

    <div class="card sale-card mt-3">
        <div class="card-header text-center d-flex justify-content-end">
            <div class="d-flex justify-content-end col-6"><h4>Location-Theme Table</h4></div>
            <div class="d-flex justify-content-end col-6"><button id="add-button" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i style="font-size:16px;" class="ion ion-md-add"></i>&nbsp;&nbsp;Add Location-Theme</button></div>
        </div>
        <div class="col-12 mt-3 mb-3" style="max-width: 1000px;">

            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="form-group">
                        <label>Filter By Location</label>
                        <select class="form-control" id="location">
                            <option value=""}>All Location</option>
                            @foreach($locations as $location)
                                <option value="{{$location->locationName}}"}>{{$location->locationName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="form-group">
                        <label>Filter By Theme</label>
                        <select class="form-control" id="theme">
                            <option value=""}>All Themes</option>
                            @foreach($themes as $theme)
                                <option value="{{$theme->name}}"}>{{$theme->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <hr/>

            <table class="table table-bordered table-responsive full-width" id="location-theme-table">

                <thead>
                <tr>
                    <th width="5%">id</th>
                    <th width="40%">Location Name(Location id)</th>
                    <th width="40%">Theme Name(Theme id)</th>
                    <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($locationThemes))
                    @foreach($locationThemes as $locationTheme)
                        <tr>
                            <td>{{$locationTheme->id}}</td>
                            <td>{{$locationTheme->location->locationName}}({{$locationTheme->location_id}})</td>
                            <td>{{$locationTheme->theme->name}}({{$locationTheme->theme_id}})</td>
                            <td>
                                <a class="btn btn-primary btn-sm text-white edit-location-theme-btn" data-location-theme-id="{{$locationTheme->id}}"><i class="feather icon-edit"></i> Edit</a>
                                <a class="btn btn-danger btn-sm text-white delete-location-theme-btn" data-location-theme-id="{{$locationTheme->id}}"><i class="feather icon-trash-2"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">No data</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <div id="addModal" class="modal fade" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="danger-header-modalLabel" style="display: none" aria-modal="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="danger-header-modalLabel">Add Location-Theme</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form id="add-form" method="POST" action="{{route('admin.m-theme-location.store')}}">
                    <div class="modal-body">
                        <div class="container">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Location</label>
                                    <select class="form-control" name="location_id">
                                        @foreach($locations as $location)
                                            <option value="{{$location->id}}">{{$location->locationName}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>Theme</label>
                                    <select class="form-control" name="theme_id">
                                        @foreach($themes as $theme)
                                            <option value="{{$theme->id}}">{{$theme->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button id="add-confirm-btn" type="submit" class="btn btn-info">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editModal" class="modal fade" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="danger-header-modalLabel" style="display: none" aria-modal="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="danger-header-modalLabel">Update Location-Theme</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="edit-location-theme-form-container"></div>
            </div>
        </div>
    </div>

    <div id="deleteModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" style="display: none" aria-modal="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Delete Location-Theme</h4>
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

            @if(count($locationThemes)>0)
            $('#location-theme-table').DataTable({
                initComplete: function () {
                    this.api().columns().every( function (index) {
                        var that = this;
                        $( '#location').on( 'keyup change clear', function () {
                            if(index === 1){
                                if ( that.search() !== $(this).val() ) {
                                    that.search($(this).val()).draw();
                                }
                            }
                        });

                        $( '#theme').on( 'keyup change clear', function () {
                            if(index === 2){
                                if ( that.search() !== $(this).val() ) {
                                    that.search($(this).val()).draw();
                                }
                            }
                        });
                    } );
                }
            });
            let locationThemeId;
            let locationTheme;
            $(document).on('click', '.delete-location-theme-btn', function () {
                locationTheme = $(this).parents('tr');
                locationThemeId = $(this).data('location-theme-id');
                $('#deleteModel').modal('show');
                console.log(locationThemeId)
            })

            @endif

            $('#delete-confirm-btn').click(function () {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: 'DELETE',
                    url: `/admin/m-theme-location/${locationThemeId}`,
                    success: function (res) {
                        console.log(res);
                        locationTheme.remove();
                    },
                    error: function (error) {
                        console.log(error)
                    }
                })
            })

            $(document).on('click', '.edit-location-theme-btn', function () {
                locationThemeId = $(this).data('location-theme-id');
                $.ajax({
                    type: 'get',
                    url: `/admin/m-theme-location/${locationThemeId}/edit`,
                    success: function (res) {
                        $('.edit-location-theme-form-container').html(res);
                        $('#editModal').modal('show');
                    },
                    error: function (err) {
                        console.log(err)
                    }
                })
            })

        });
    </script>
@endsection

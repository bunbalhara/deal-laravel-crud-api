@extends('layouts.admin')
@section('style')
@endsection
@section('content')

    <div class="card sale-card mt-3">
        <div class="card-header text-center d-flex justify-content-end">
            <div class="d-flex justify-content-end col-6"><h4>Special Dates Table</h4></div>
            <div class="d-flex justify-content-end col-6"><button id="add-button" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i style="font-size:16px;" class="ion ion-md-add"></i>&nbsp;&nbsp;Add New Special Date</button></div>
        </div>
        <div class="col-12 mt-3 mb-3" style="max-width: 1000px;">

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

            <table class="table table-bordered table-responsive full-width" id="special-date-table">

                <thead>
                <tr>
                    <th width="5%">id</th>
                    <th width="30%"> Name</th>
                    <th width="10%">From Date</th>
                    <th width="10%">To Date</th>
                    <th width="10%">Active</th>
                    <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($specialDates))
                    @foreach($specialDates as $specialDate)
                        <tr>
                            <td>{{$specialDate->id}}</td>
                            <td>{{$specialDate->name}}</td>
                            <td>{{date('Y-m-d', strtotime($specialDate->from_date))}}</td>
                            <td>{{date('Y-m-d', strtotime($specialDate->to_date))}}</td>
                            <td>
                                @if($specialDate->active)
                                    <span class="badge badge-success">Active</span>
                                    <span hidden>Yes</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                    <span hidden>No</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm text-white edit-special-date-btn" data-theme-id="{{$specialDate->id}}"><i class="feather icon-edit"></i> Edit</a>
                                <a class="btn btn-danger btn-sm text-white delete-special-date-btn" data-theme-id="{{$specialDate->id}}"><i class="feather icon-trash-2"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">No data</td>
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
                    <h4 class="modal-title" id="danger-header-modalLabel">Add a New Theme</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form id="add-form" method="POST" action="{{route('admin.special-date.store')}}">
                    <div class="modal-body">
                        <div class="container">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control" required/>
                                </div>

                                <div class="form-group col-12">
                                    <label>From Date</label>
                                    <input type="text" name="from_date" class="form-control date" id="fromdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                                </div>

                                <div class="form-group col-12">
                                    <label>To Date</label>
                                    <input type="text" name="to_date" class="form-control date" id="todatepicker" data-toggle="date-picker" data-single-date-picker="true">
                                </div>

                                <div class="form-group  col-12">
                                    <label>Active</label>
                                    <select class="form-control" name="active">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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
                    <h4 class="modal-title" id="danger-header-modalLabel">Update Theme</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="edit-special-date-form-container"></div>
            </div>
        </div>
    </div>

    <div id="deleteModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" style="display: none" aria-modal="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Delete Theme</h4>
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

            @if(count($specialDates)>0)

            $('#special-date-table').DataTable({
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

            let themeId;
            let theme;
            $(document).on('click', '.delete-special-date-btn', function () {
                theme = $(this).parents('tr');
                themeId = $(this).data('theme-id');
                $('#deleteModel').modal('show');
                console.log(themeId)
            })

            @endif

            $('#delete-confirm-btn').click(function () {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: 'DELETE',
                    url: `/admin/special-date/${themeId}`,
                    success: function (res) {
                        console.log(res);
                        theme.remove();
                    },
                    error: function (error) {
                        console.log(error)
                    }
                })
            })

            $(document).on('click', '.edit-special-date-btn', function () {
                themeId = $(this).data('theme-id');
                $.ajax({
                    type: 'get',
                    url: `/admin/special-date/${themeId}/edit`,
                    success: function (res) {
                        $('.edit-special-date-form-container').html(res);
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

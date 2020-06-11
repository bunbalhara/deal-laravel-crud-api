<form id="add-form" method="POST" action="{{route('admin.special-date.update', $specialDate->id)}}">
    <div class="modal-body">
        <div class="container">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="form-group col-12">
                    <label>Name</label>
                    <input type="text" name="name"  value="{{$specialDate->name}}"  placeholder="Name" class="form-control" required/>
                </div>

                <div class="form-group col-12">
                    <label>From Date</label>
                    <input type="text" name="from_date" value="{{date('m/d/Y', strtotime($specialDate->from_date))}}" class="form-control date" data-toggle="date-picker" data-single-date-picker="true">
                </div>

                <div class="form-group col-12">
                    <label>To Date</label>
                    <input type="text" name="to_date" value="{{date('m/d/Y', strtotime($specialDate->to_date))}}"  class="form-control date" data-toggle="date-picker" data-single-date-picker="true">
                </div>


                <div class="form-group  col-12">
                    <label>Active</label>
                    <select class="form-control" name="active">
                        <option value="1" {{$specialDate->active?'selected':''}}>Active</option>
                        <option value="0" {{!$specialDate->active?'selected':''}}>Inactive</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button id="add-confirm-btn" type="submit" class="btn btn-info">Update</button>
    </div>
</form>

<script src="{{asset('assets/js/app.min.js')}}"></script>

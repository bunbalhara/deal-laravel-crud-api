<form id="add-form" method="POST" action="{{route('admin.theme.update', $theme->id)}}">
    <div class="modal-body">
        <div class="container">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="form-group col-12">
                    <label>Theme Name</label>
                    <input type="text" value="{{$theme->name}}" name="name" placeholder="Theme Name" class="form-control" required/>
                </div>
                <div class="form-group col-12">
                    <label>Active</label>
                    <select class="form-control" name="active">
                        <option value="1" {{$theme->active?'selected':''}}>Active</option>
                        <option value="0" {{!$theme->active?'selected':''}}>Inactive</option>
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

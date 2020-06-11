<form id="add-form" method="POST" action="{{route('admin.m-theme-location.update',['m_theme_location'=>$locationTheme->id])}}">
    <div class="modal-body">
        <div class="container">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="form-group col-12">
                    <label>Location</label>
                    <select class="form-control" name="location_id">
                        @foreach($locations as $location)
                            <option value="{{$location->id}}" {{$locationTheme->location_id==$location->id?'selected':''}}>{{$location->locationName}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12">
                    <label>Theme</label>
                    <select class="form-control" name="theme_id">
                        @foreach($themes as $theme)
                            <option value="{{$theme->id}}"  {{$locationTheme->theme_id==$theme->id?'selected':''}}>{{$theme->name}}</option>
                        @endforeach
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


@extends('layouts.admin')
@section('style')
    <style>
        .input-group-text {
            display: flex;
            align-items: center;
            padding: 0.65rem 0.9rem!important;
            margin-bottom: 0;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 8.5;
            color: #495057;
            text-align: center;
            white-space: nowrap;
            background-color: #e9ecef;
            border: 1px solid #dee2e6;
            border-radius: 0 0.25rem 0.25rem 0!important;
        }
    </style>
@endsection
@section('content')
    <div class="card sale-card mt-3">
        <div class="card-header bg-info text-white">
            <h5>Creat New Deal</h5>
        </div>
        <div class="card-body">
            <form method="post"  action="{{route('admin.location.update', $location->id)}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Location Name</label>
                        <input  value="{{$location->locationName}}" type="text" name="locationName" placeholder="Location Name" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-6  col-12">
                        <label>Location About</label>
                        <textarea type="text" name="locationAbout" placeholder="Location About" class="form-control" required>{{$location->locationAbout}}</textarea>
                    </div>
                    <div class=" col-md-6  col-12">
                        <label>Location Photo</label>
                        <div class="input-group">
                            <input value="{{$location->locationPhoto}}" type="text" name="locationPhoto" class="form-control" required/>

                            <label style="cursor: pointer" for="locationPhoto">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="feather icon-upload"></i></span>
                                    <input type="file" id="locationPhoto" name="select_file" hidden/>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="form-group  col-md-6 col-12">
                        <label>Active</label>
                        <select class="form-control" name="active">
                            <option value="1" {{$location->active?'selected':''}}>Active</option>
                            <option value="0" {{!$location->active?'selected':''}}>Inactive</option>
                        </select>
                    </div>

                    <div class="form-group col-12">
                        <label>WYSIWYG blob</label>
                        <textarea  name="blob" class="form-control m-input " id="locationBlob" rows="3">{!! $location->blob !!}</textarea>
                    </div>
                </div>
                <hr />
                <a href="{{route('admin.location.index')}}" class="btn btn-danger btn-sm" > Back </a>
                <button type="submit" class="btn btn-primary btn-sm"> Update </button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/vendors/header/actions.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/tinymce.min.js')}}" type="text/javascript"></script>

    <script>
        AddTinyMce();
        function AddTinyMce() {
            tinymce.init({
                selector: 'textarea#locationBlob',
                height: 500,
                theme: 'modern',
                plugins: [
                    'advlist autolink autosave lists codesample link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table directionality',
                    'emoticons paste textpattern imagetools textcolor colorpicker autoresize'
                ],
                toolbar1: 'rtl|fontselect | fontsizeselect | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print preview media | codesample jsplusEditTag | emoticons | link unlink image jsplus_templates',
                remove_script_host: false,
                convert_urls: true,
                image_title: true,
                automatic_uploads: true,
                relative_urls: false,
                images_upload_url: '{{route('article-uploadImage')}}',
                file_picker_types: 'image',
                file_picker_callback: function (cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function () {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function () {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), {title: file.name});
                        };
                    };
                    input.click();
                },
            });

        }

        $('#locationPhoto').change(function () {
            let formData = new FormData();
            formData.append('select_file', this.files[0])
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url:'/image-upload/upload',
                data:formData,
                cache:false,
                processData: false,
                contentType:false,
                success:function (res) {
                    $('input[name="locationPhoto"]').val(res.imageURL)
                    toastr.success(res.success)
                },
                error:function (error) {
                    console.log(error)
                }
            })
        })
    </script>
@endsection

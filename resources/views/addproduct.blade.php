@extends('layouts.app')
@section('title','Add new Product')
@section('content')


                <div class="panel panel-success">
                    <div class="panel-heading">Add new Product</div>
                    <div class="panel-body">
                        <div class="form-horizontal">


                            <div class="form-group">
                                <label for="pageId" class="col-md-4 control-label">Product For</label>

                                <div class="col-md-6">
                                    <select id="pageId" class="form-control">
                                        @foreach(\App\FacebookPages::where('userId',Auth::user()->id)->get() as $p)
                                        <option value="{{$p->pageId}}">{{$p->pageName}}</option>
                                            @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Product Title</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-md-4 control-label">Image Upload</label>

                                <div class="col-md-6">
                                    <form id="uploadimage" method="post" enctype="multipart/form-data">
                                        <label>Select Your Image</label><br/>
                                        <input type="file" name="file"
                                               id="file"/><br>
                                        <input class="btn btn-xs btn-success" type="submit" value="Upload"
                                               id="imgUploadBtn"/>
                                        <input type="hidden" id="image">
                                        <div id="imgMsg"></div>
                                    </form>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="shortDescription" class="col-md-4 control-label">Short Description</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="shortDescription">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="longDescription" class="col-md-4 control-label">Long Description</label>

                                <div class="col-md-6">
                                    <textarea id="longDescription" class="form-control" rows="3"></textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price" class="col-md-4 control-label">Price</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="price">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-md-4 control-label">Category</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        @if($wooCategories != "none")
                                            @foreach($wooCategories as $wc)
                                                <option value="{{$wc['id']}}">{{$wc['name']}} ( WooCommerce )</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="featured" class="col-md-4 control-label">Featured</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="featured">

                                        <option>no</option>
                                        <option>yes</option>

                                    </select>

                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button id="addproduct" class="btn btn-primary">
                                        <i class="fa fa-btn fa-plus"></i> Add Product
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


@endsection

@section('js')
    <script>

        $("#uploadimage").on('submit', (function (e) {
            e.preventDefault();
            $('#imgMsg').html("Please wait ...");
            $.ajax({
                type: "POST",
                url: "{{url('/iup')}}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {

                    if (data['status'] == 'success') {
                        $('#image').val(data['fileName']);
                        $('#imgMsg').html("Your file uploaded and it's name : " + data['fileName']);
                        swal('Success!', 'Image File succefully uploaded', 'success');
                        $('#imgPreview').attr('src', 'uploads/' + data['fileName']);

                    }
                    else {
                        swal('Error!', data, 'error');
                        $('#imgMsg').html("Something went wrong can't upload image");

                    }
                }
            });
        }));


        $('#addproduct').click(function () {
            var postFb = "no";
            var postWp = "no";
            if ($('#postFb').is(':checked')) {
                postFb = "yes";
            }
            if ($('#postWp').is(':checked')) {
                postWp = "yes";
            }

            $.ajax({
                type: 'POST',
                url: '{{url('/addproduct')}}',
                data: {
                    'title': $('#title').val(),
                    'shortDescription': $('#shortDescription').val(),
                    'longDescription': $('#longDescription').val(),
                    'image': $('#image').val(),
                    'price': $('#price').val(),
                    'category': $('#category').val(),
                    'featured': $('#featured').val(),
                    'postFb': postFb,
                    'postWp': postWp,
                    'pageId':$('#pageId').val()
                },
                success: function (data) {
                    console.log(data);
                    swal('Success', 'Done', 'success');

                },
                error: function (data) {
                    swal('Error', data, 'error');
                }
            });
        });
    </script>
@endsection

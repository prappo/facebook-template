@extends('layouts.app')
@section('title','Software Settings')
@section('content')
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border" align="center">
                <h3 class="box-title"><i style="color:#4A67AD" class="fa fa-facebook-square"></i> Settings</h3>
            </div><!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <label for="fbAppId">Facebook App ID</label>
                    <input class="form-control" value="{{ $fbAppId }}" id="fbAppId"
                           placeholder="Your facebook app id"
                           type="text">
                </div>
                <div class="form-group">
                    <label for=fbAppSec">Facebook App Secret</label>
                    <input class="form-control" value="{{ $fbAppSec }}" id="fbAppSec"
                           placeholder="Your facebook app secret" type="text">
                </div>


                <div class="form-group">
                    <label><input @if(\App\Http\Controllers\Settings::isEbotActive(Auth::user()->id)) checked
                                  @endif type="checkbox" id="botActive"> Active E-Commerce Bot </label>
                </div>


            </div><!-- /.box-body -->

            <div class="box-footer">

                @if($fbAppId != "" && $fbAppSec != "")
                    <a href="{{ $loginUrl }}" class="btn btn-facebook"><i
                                class="fa fa-facebook-square"></i> Connect with facebook</a>
                @endif

                <button id="fbSettingSave" class="btn btn-success"><i class="fa fa-save"></i> Save
                </button>
            </div>

        </div>
    </div>


@stop
@section('js')
    <script>
        $('#fbSettingSave').click(function () {
            var botStatus = "";
            if($('#botActive').is(':checked'))
            {
                botStatus = "active";
            }
            $.ajax({
                url: '{{url('/settings/software')}}',
                type: 'POST',
                data: {
                    'fbAppId': $('#fbAppId').val(),
                    'fbAppSec': $('#fbAppSec').val(),
                    'botStatus': botStatus,
                    'fbToken':$('#fbToken').val()
                },
                success: function (data) {
                    if (data == "success") {
                        alert("Saved !");
                        location.reload();
                    } else {
                        alert(data)
                    }
                },
                error: function (data) {
                    alert("Something went wrong");
                    console.log(data.responseText);
                }
            })
        })
    </script>

@endsection













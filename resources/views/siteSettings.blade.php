@extends('layouts.app')
@section('title','Site Settings')
@section('content')

        <div class="panel panel-success">
            <div class="panel-heading">Update Site Settings</div>
            <div class="panel-body">
                <div class="form-horizontal">


                    <div class="form-group">
                        <label for="appId" class="col-md-4 control-label">Facebook App ID</label>

                        <div class="col-md-6">
                            <input value="{{\App\SiteSettings::where('key','appId')->value('value')}}" type="text"
                                   class="form-control" id="appId">

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="appSec" class="col-md-4 control-label">Facebook App Secret</label>

                        <div class="col-md-6">
                            <input value="{{\App\SiteSettings::where('key','appSec')->value('value')}}" type="text"
                                   class="form-control" id="appSec">

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button id="update" class="btn btn-block btn-success">
                                <i class="fa fa-btn fa-save"></i> Update
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


@endsection

@section('js')
    <script>

        $('#update').click(function () {
            $.ajax({
                type: 'POST',
                url: "{{url('/settings/site')}}",
                data: {
                    'appId': $('#appId').val(),
                    'appSec': $('#appSec').val()

                },
                success: function (data) {
                    if (data == 'success') {
                        swal('Success', 'Updated', 'success');
                        location.reload();
                    }
                    else {
                        swal("Error", data, 'error');
                    }

                }
            });
        });


    </script>
@endsection

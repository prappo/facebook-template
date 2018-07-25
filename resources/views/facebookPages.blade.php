@extends('layouts.app')
@section('title','Facebook pages')
@section('content')
    @if(\App\Settings::where('userId',Auth::user()->id)->value('appId') == "")
        <h1>You need to configure your facebook settings first</h1>
        <a href="{{url('/settings/software')}}">Go to settings</a>
    @else
        <div class="panel panel-success">

            <div class="panel-body">
                <div class="list-group">

                    @foreach($pages as $page)
                        <li class="list-group-item"><a target="_blank"
                                                       href="{{url('/settings/pages')}}/{{$page->pageId}}">{{$page->pageName}}</a>
                            <div class="btn-group pull-right">
                                <a class="btn btn-primary btn-xs" href="{{url('/settings/pages').'/'.$page->pageId}}"
                                   target="_blank"><i class="fa fa-cogs"></i> Config</a>

                                <button id="{{$page->id}}" class="btn btn-xs btn-danger"><i
                                            class="fa fa-trash"></i> Delete
                                </button>
                            </div>
                        </li>
                    @endforeach


                </div>

            </div>
        </div>
    @endif


@stop
@section('js')
    <script>
        $('.btn-danger').click(function () {
            var pageId = $(this).attr('id');
            $.ajax({
                url: '{{url('/delete/page')}}',
                type: 'POST',
                data: {
                    'pageId': pageId
                },
                success: function (data) {
                    if (data == "success") {
                        location.reload();
                    } else {
                        alert(data);
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
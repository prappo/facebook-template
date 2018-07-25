@extends('layouts.app')
@section('title','Facebook pages')
@section('content')

    <div class="panel panel-success">
        <div class="panel-heading">Select a page
        </div>
        <div class="panel-body">
            <div class="list-group">

                @foreach($datas as $page)
                    <li class="list-group-item"><a target="_blank"
                                                   href="{{url('/campaign/page')}}/{{$page->pageId}}"><i class="fa fa-facebook-square"></i> {{$page->pageName}}</a>

                    </li>
                @endforeach


            </div>

        </div>
    </div>



@stop

@extends('layouts.app')
@section('title','Home')
@section('content')

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{\App\User::all()->count()}}</h3>

                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>

            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{\App\FacebookPages::all()->count()}}</h3>

                    <p>Facebook Pages</p>
                </div>
                <div class="icon">
                    <i class="fa fa-facebook-square"></i>
                </div>

            </div>
        </div>


    </div>



@endsection
@section('js')



@endsection
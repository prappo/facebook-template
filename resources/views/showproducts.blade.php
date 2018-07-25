@extends('layouts.app')
@section('title','Products')
@section('content')

    <div class="panel panel-success">
        <div class="panel-heading">Products</div>

        <div class="panel-body">
            <div class="container">

                {{--<div class="row">--}}
                    {{--<div class="col-xs-4 item-photo">--}}
                        {{--<img style="max-width:100%;"--}}
                             {{--src="https://ak1.ostkcdn.com/images/products/8818677/Samsung-Galaxy-S4-I337-16GB-AT-T-Unlocked-GSM-Android-Cell-Phone-85e3430e-6981-4252-a984-245862302c78_600.jpg"/>--}}
                    {{--</div>--}}
                    {{--<div class="col-xs-5" style="border:0px solid gray">--}}
                        {{--<!-- Datos del vendedor y titulo del producto -->--}}
                        {{--<h3>Samsung Galaxy S4 I337 16GB 4G LTE Unlocked GSM Android Cell Phone</h3>--}}
                        {{--<h5 style="color:#337ab7">Short description</small></h5>--}}


                        {{--<h3 style="margin-top:0px;">U$S 399</h3>--}}


                        {{--<!-- Botones de compra -->--}}
                        {{--<div class="section" style="padding-bottom:20px;">--}}
                            {{--<button class="btn btn-success"><span style="margin-right:20px"--}}
                                                                  {{--class="glyphicon glyphicon-shopping-cart"--}}
                                                                  {{--aria-hidden="true"></span> Agregar al carro--}}
                            {{--</button>--}}

                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-xs-9">--}}

                        {{--<div style="width:100%;border-top:1px solid silver">--}}
                            {{--<p style="padding:15px;">--}}
                                {{--<small>--}}
                                    {{--Stay connected either on the phone or the Web with the Galaxy S4 I337 from Samsung.--}}
                                    {{--With 16 GB of memory and a 4G connection, this phone stores precious photos and--}}
                                    {{--video and lets you upload them to a cloud or social network at blinding-fast speed.--}}
                                    {{--With a 17-hour operating life from one charge, this phone allows you keep in touch--}}
                                    {{--even on the go.--}}

                                    {{--With its built-in photo editor, the Galaxy S4 allows you to edit photos with the--}}
                                    {{--touch of a finger, eliminating extraneous background items. Usable with most--}}
                                    {{--carriers, this smartphone is the perfect companion for work or entertainment.--}}
                                {{--</small>--}}
                            {{--</p>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                @foreach($data as $d)



                    <div class="row">
                        <div class="col-xs-4 item-photo">
                            <img style="max-width:100%;" src="{{url('/uploads')."/".$d->image}}"/>
                        </div>
                        <div class="col-xs-5" style="border:0px solid gray">
                            <!-- Datos del vendedor y titulo del producto -->
                            <h3>{{$d->title}}</h3>
                            <h5 style="color:#337ab7">
                                <small>{{$d->short_description}}</small>
                            </h5>


                            <h3 style="margin-top:0px;">$ {{$d->price}}</h3>


                            <!-- Botones de compra -->
                            <div class="section" style="padding-bottom:20px;">
                                <div class="btn-group" role="group" aria-label="...">
                                    <a class="btn btn-primary btn-xs"
                                       href="{{url('/update/product')}}/{{$d->id}}"><i
                                                class="fa fa-edit"> Edit Product</i> </a>
                                    <a data-value="{{$d->status}}" data-id="{{$d->id}}"
                                       class="btn @if($d->status=='published')btn-warning @else btn-success @endif btn-xs"> @if($d->status=='published')
                                            Unpublish @else Publish @endif Product </a>
                                    <a data-id="{{$d->id}}" class="btn btn-danger btn-xs"><i
                                                class="fa fa-times">
                                            Delete Product</i> </a>
                                </div>

                            </div>
                        </div>

                        <div class="col-xs-9">

                            <div style="width:100%;border-bottom:1px solid silver;margin-bottom: 10px">
                                <p style="padding:15px;">
                                    <small>
                                        {{$d->long_description}}
                                    </small>
                                </p>

                            </div>
                        </div>
                    </div>



                    {{--<div class="row">--}}

                        {{--<div class="col-md-3">--}}
                            {{--<a href="#" class="thumbnail">--}}
                                {{--<img src="{{url('/uploads')."/".$d->image}}" alt="">--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-7">--}}
                            {{--<h1>{{$d->title}} @if($d->featured == "yes") <span--}}
                                        {{--class="badge">Featured</span> @endif</h1>--}}
                            {{--<h3>${{$d->price}} </h3>--}}
                            {{--<p>{{$d->short_description}}</p>--}}
                            {{--<p>{{$d->long_description}}</p>--}}
                            {{--<h4>Category : <span--}}
                                        {{--class="badge">{{\App\Catagories::where('id',$d->category)->value('name')}}</span>--}}
                            {{--</h4>--}}
                            {{--<h4>Status : <span class="badge">{{$d->status}}</span></h4>--}}
                            {{--<h4><i class="fa fa-facebook"></i> <span--}}
                                        {{--class="badge">{{\App\FacebookPages::where('pageId',$d->pageId)->value('pageName')}}</span>--}}
                            {{--</h4>--}}
                            {{--<br>--}}

                        {{--</div>--}}
                        {{--<div class="col-md-2">--}}
                            {{--<div class="btn-group-vertical" role="group" aria-label="...">--}}
                                {{--<a class="btn btn-primary btn-xs"--}}
                                   {{--href="{{url('/update/product')}}/{{$d->id}}"><i--}}
                                            {{--class="fa fa-edit"> Edit Product</i> </a>--}}
                                {{--<a data-value="{{$d->status}}" data-id="{{$d->id}}"--}}
                                   {{--class="btn @if($d->status=='published')btn-warning @else btn-success @endif btn-xs"> @if($d->status=='published')--}}
                                        {{--Unpublish @else Publish @endif Product </a>--}}
                                {{--<a data-id="{{$d->id}}" class="btn btn-danger btn-xs"><i--}}
                                            {{--class="fa fa-times">--}}
                                        {{--Delete Product</i> </a>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                @endforeach
                {!! $data->render() !!}
            </div>

        </div>
    </div>
    </div>

@endsection

@section('js')
    <script>
        $('.btn-warning').click(function () {
            $.ajax({
                type: 'POST',
                url: '{{url('/product/status')}}',
                data: {
                    'id': $(this).attr('data-id'),
                    'status': $(this).attr('data-value')
                },
                success: function (data) {
                    if (data == 'success') {
                        swal('Success', 'Product status updated', 'success');
                        location.reload();
                    }
                    else {
                        swal('Error', data, 'error');
                    }
                }

            });
        });

        $('.btn-success').click(function () {
            $.ajax({
                type: 'POST',
                url: '{{url('/product/status')}}',
                data: {
                    'id': $(this).attr('data-id'),
                    'status': $(this).attr('data-value')
                },
                success: function (data) {
                    if (data == 'success') {
                        swal('Success', 'Product status updated', 'success');
                        location.reload();
                    }
                    else {
                        swal('Error', data, 'error');
                    }
                }

            });
        });

        $('.btn-danger').click(function () {
            var id = $(this).attr('data-id');


            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this product!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                $.ajax({
                    type: 'POST',
                    url: '{{url('/delete/product')}}',
                    data: {
                        'id': id
                    },
                    success: function (data) {
                        if (data == 'success') {
                            swal('Success', 'Product deleted', 'success');
                            location.reload();
                        }
                        else {
                            swal('Error', data, 'error');
                        }
                    }
                });
            });

        })
    </script>
@endsection
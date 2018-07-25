<!DOCTYPE html>
<html lang="en" xmlns="https://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>


    {{--<link rel="apple-touch-icon" sizes="57x57" href="{{url('images/apple-icon-57x57.png')}}">--}}
    {{--<link rel="apple-touch-icon" sizes="60x60" href="{{url('images/apple-icon-60x60.png')}}">--}}
    {{--<link rel="apple-touch-icon" sizes="72x72" href="{{url('images/apple-icon-72x72.png')}}">--}}
    {{--<link rel="apple-touch-icon" sizes="76x76" href="{{url('images/apple-icon-76x76.png')}}">--}}
    {{--<link rel="apple-touch-icon" sizes="114x114" href="{{url('images/apple-icon-114x114.png')}}">--}}
    {{--<link rel="apple-touch-icon" sizes="120x120" href="{{url('images/apple-icon-120x120.png')}}">--}}
    {{--<link rel="apple-touch-icon" sizes="144x144" href="{{url('images/apple-icon-144x144.png')}}">--}}
    {{--<link rel="apple-touch-icon" sizes="152x152" href="{{url('images/apple-icon-152x152.png')}}">--}}
    {{--<link rel="apple-touch-icon" sizes="180x180" href="{{url('images/apple-icon-180x180.png')}}">--}}
    {{--<link rel="icon" type="image/png" sizes="192x192" href="{{url('images/android-icon-192x192.png')}}">--}}
    {{--<link rel="icon" type="image/png" sizes="32x32" href="{{url('images/favicon-32x32.png')}}">--}}
    {{--<link rel="icon" type="image/png" sizes="96x96" href="{{url('images/favicon-96x96.png')}}">--}}
    {{--<link rel="icon" type="image/png" sizes="16x16" href="{{url('images/favicon-16x16.png')}}">--}}
    <link rel="manifest" href="{{url('images/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    {{--<meta name="msapplication-TileImage" content="{{url('images/ms-icon-144x144.png')}}">--}}
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    @if(\Illuminate\Support\Facades\Auth::check())
        @if(\Illuminate\Support\Facades\Auth::user()->theme == "")
            <link rel="stylesheet"
                  href="{{url('')."/themes/paper/bootstrap.min.css"}}">
        @else
            <link rel="stylesheet"
                  href="{{url('')."/themes/".\Illuminate\Support\Facades\Auth::user()->theme."/bootstrap.min.css"}}">
        @endif

    @else
        <link rel="stylesheet"
              href="{{url('')."/themes/paper/bootstrap.min.css"}}">
    @endif

    {{--<link rel="stylesheet" href="https://bootswatch.com/slate/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="{{url('/css/style.css')}}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    {{--data table--}}

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }


    </style>


    @yield('css')
</head>
<body id="app-layout">

<br><br>
@yield('content')

<div style="padding: 10px" align="center" class="footer">
    &copy;
    <script>document.write(new Date().getFullYear())</script>
    , Srigal.
</div>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
{{--data table--}}

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
<script src="{{url('/js/pdfmake.min.js')}}"></script>
<script src="{{url('/js/vfs_fonts.js')}}"></script>


@yield('js')
<script>
    $(document).ready(function () {
        var table = $('#mytable').DataTable({
            dom: '<""flB>tip',
            buttons: [
                {
                    extend: 'excel',
                    text: '<button class="btn btn-success btn-xs fak"><i class="fa fa-file-excel-o"></i> Export all to excel</button>'
                },
                {
                    extend: 'csv',
                    text: '<button class="btn btn-warning btn-xs fak"><i class="fa fa-file-o"></i> Export all to csv</button>'
                },
                {
                    extend: 'print',
                    text: '<button class="btn btn-default btn-xs fak"><i class="fa fa-print"></i> Print all</button>'
                },
            ]
        });

        $('#massMsg').click(function () {
            swal({
                title: "Mass Messaging!",
                text: "Send message to your customers",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Write something",
                showLoaderOnConfirm: true,
            }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                $.ajax({
                    type: 'POST',
                    url: '{{url('/notify')}}',
                    data: {
                        'msg': inputValue
                    },
                    success: function (data) {
                        if (data.search('message_id') != -1) {
                            swal('Success', 'Message sent to all customers', 'success');
                        }
                        else {
                            swal('Error', data, 'error');
                        }
                    }
                });
            });
        })
    });

    $('.themeName').click(function () {
        var theme = $(this).attr('data-name');
        $.ajax({
            type: 'POST',
            url: '{{url('/update/theme')}}',
            data: {
                'theme': theme
            },
            success: function (data) {
                if (data == "success") {
                    location.reload();
                } else {
                    alert("Sorry ! Can't change the theme");
                }
            },
            error: function (data) {
                alert("Something went wrong");
                console.log(data.responseText);

            }
        })
    });

</script>

</body>
</html>

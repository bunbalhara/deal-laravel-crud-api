<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ERP Project') }}</title>


    <!-- Summernote css -->

    <link href="{{asset('assets/css/vendor/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/vendor/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/vendor/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/vendor/select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    @yield('style')
    <style>
        th, td{
            text-align: center!important;
        }

        tfoot th{
            padding: 0!important;
        }
    </style>
</head>

<body>
    <main>
        <div class="wrapper">
            @include('includes.dashboard.left-side-menu')
            @include('includes.dashboard.header')
            <div class="content-page">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</body>
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <script src="{{asset('assets/toastr/toastr.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.select.min.js')}}"></script>
    @yield('script')
    <script>
        @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        toastr.error('{{$error}}')
        @endforeach
        @endif

        @if(Session::get('success'))
        toastr.success('{{Session::pull('success')}}')
        @endif
    </script>
</html>

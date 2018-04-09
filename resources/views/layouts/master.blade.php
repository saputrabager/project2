<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/skins/skin-blue-light.min.css')}}" />
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}"/>

    @yield('stylesheets')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layouts.core.header')
        @include('layouts.core.sidebar')
        @yield('content')
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- highcahrts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- bootsrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- adminLTE -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <!-- datatables -->
    <script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
    @yield('scripts')
</body>
</html>
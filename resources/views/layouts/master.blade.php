<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Db Asset</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/skins/skin-blue-light.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/DataTables/datatables.min.css')}}"/>
    <!-- select2 -->
    <link rel="stylesheet" href="{{asset('vendor/select2-4.0.5/dist/css/select2.min.css')}}"/>

    @yield('stylesheets')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layouts.core.header')
        @include('layouts.core.sidebar')
        @yield('content')
    </div>
    <!-- jquery -->
    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
    <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
    <!-- highcahrts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- bootsrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- adminLTE -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <!-- datatables -->
    <script type="text/javascript" src="{{asset('vendor/DataTables/datatables.min.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('DataTables/dataTables.bootstrap.min.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('vendor/DataTables/buttons/1.5.1/js/dataTables.buttons.min.js')}}"></script>
    <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="{{asset('vendor/DataTables/select/1.2.5/js/dataTables.select.min.js')}}"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
    <!-- <script src="{{ asset('plugins/editor/js/dataTables.editor.min.js') }}"></script> -->
    <!-- validate.js -->
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script src="{{ asset('js/highcharts/charts.js') }}"></script>
    <script src="{{ asset('js/validate.min.js') }}"></script>
    <!-- jQuery edit tABLE -->
    <script type="text/javascript" src="{{asset('js/jquery.tabledit.min.js')}}"></script>
    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
    <!-- select2 -->
    <script src="{{ asset('vendor/select2-4.0.5/dist/js/select2.min.js') }}"></script>
    <!-- sweet alert -->
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <!-- event js -->
    <script src="{{ asset('js/event.js') }}"></script>
    <script type="text/javascript">
        role = '{{Auth::user()->role}}';
        BASE_URL = "{{URL::to('/')}}";
    </script>
    
    @yield('scripts')
</body>
</html>
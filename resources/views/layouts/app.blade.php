<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/DataTables/datatables.min.css')}}"/>
    <!-- select2 -->
    <link rel="stylesheet" href="{{asset('vendor/select2-4.0.5/dist/css/select2.min.css')}}"/>
</head>
<body>
    <div id="app">
        <header>
            <!-- <img src="{{ asset ('images/housebanner.jpg')}}" style="width: 100%; height: 140px"> -->
        </header>
        <nav class="navbar navbar-default navbar-static-top" style="background: #ffffff">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Db Asset') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
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
    <!-- datepicker -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript">
        role = '';
    function submitSplit (){
        // action = {{env('API_URL')}};
        // action += type == 'save' ? '/data-saved' : '/data-saved';
        alert('type');
    }
    </script>
    
</body>
</html>


        

@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <table id="pageTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NO ASSETS</th>
                            <th>DESCRIPTION</th>
                            <th>MIC</th>
                            <th>CATEGORY</th>
                            <th>PARENT</th>
                            <th>LOCATION</th>
                            <th>CONDITIONS</th>
                            <th>FIGURE</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($val as $item)
                        <tr>
                            <td></td>
                            <td>
                                {{ $item->NO_ASSET }}
                            </td>
                            <td>
                                {{ $item->DESCRIPTION }}
                            </td>
                            <td>
                                {{ $item->MIC }}
                            </td>
                            <td>
                                {{ $item->CATEGORY }}
                            </td>
                            <td>
                                {{ $item->PARENT }}
                            </td>
                            <td>
                                {{ $item->LOCATION }}
                            </td>
                            <td>
                                {{ $item->CONDITION }}
                            </td>
                            <td>
                                {{ $item->FIGURE }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script>
         jQuery(function($) {
        //initiate dataTables plugin
        var myTable = 
        $('#pageTable')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( );
        });
    </script>
@endsection
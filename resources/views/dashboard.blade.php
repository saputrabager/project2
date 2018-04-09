
        

@extends('layouts.master')

@section('content')
    <div class="content-wrapper" style="height: auto;">
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
        <div class="col-md-12">
            <section class="content">
                <div class="row">
                    <table id="pageTable" class="table table-bordered table-hover stripe">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NO ASSETS</th>
                                <th>DESCRIPTION</th>
                                <th>MIC</th>
                                <th>BOOK VALUE</th>
                                <th>CATEGORY</th>
                                <th>PARENT</th>
                                <th>LOCATION</th>
                                <th>CONDITIONS</th>
                                <th>FIGURE</th>
                            </tr>
                        </thead>

                        <tbody id="dt-table">
                        </tbody>
                    </table>
                    <div id="chart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>

                
            </section>
        </div><div class='clearfix'></div>
        
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/highcharts/charts.js') }}"></script>
    <script>
        var datatable = <?php echo $val?>;
        var i = 1;
        $.each(datatable, function(key,val){
            data = 
            "<tr>" + 
            "<td>" + i + "</td>" +
            "<td>" + val.NO_ASSET + "</td>" +
            "<td>" + val.DESCRIPTION + "</td>" +
            "<td>" + val.MIC + "</td>" +
            "<td>" + "" + "</td>" +
            "<td>" + val.CATEGORY + "</td>" +
            "<td>" + val.PARENT + "</td>" +
            "<td>" + val.LOCATION + "</td>" +
            "<td>" + val.CONDITIONS + "</td>" +
            "<td>" + val.FIGURE + "</td>" +
            "</tr>";
            i ++;
            $('#dt-table').append(data);
        });
         jQuery(function($) {
        //initiate dataTables plugin
        var myTable = 
        $('#pageTable')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( );
        });
    </script>
@endsection
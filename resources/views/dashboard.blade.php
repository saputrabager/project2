@extends('layouts.master')

@section('content')
    <div class="content-wrapper" style="height: auto;">
        <section class="content-header col-md-12">
            <div class="row">
                <h1>
                    Dashboard
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                    <a class="pull-right button" style="margin-top: -4px;margin-left:4px" data-toggle="modal" data-target="#myModal">Add New Data</a>
                    <a href="{{route('export.inventory')}}" class="pull-right button" style="margin-top: -4px" >Export to Excel</a>
                </ol>
            </div>
        </section>
        <section class="content">
            <div class="row" style="margin-bottom: 15px">
                <div class="col-md-12">
                    <table id="pageTable" class="table table-bordered table-hover stripe">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NO EQUIPMENT</th>
                                <th>NO ASSETS</th>
                                <th>DESCRIPTION</th>
                                <th>MIC</th>
                                <th>BOOK VALUE</th>
                                <th>CATEGORY</th>
                                <th>PARENT</th>
                                <th>LOCATION</th>
                                <th>CONDITIONS</th>
                                <th>FIGURE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tbody id="dt-table"></tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span class="center" style="text-align: center;">Grafik kondisi barang</span>
                    <div id="chart" style="margin: 0 auto"></div>
                </div>
            </div>
        </section>
        <div class='clearfix'></div>
        
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Input Data</h4>
              </div>
              <div class="modal-body">
                <form id="formInput"  method="POST" class="form-horizontal" role="form">
                    {{csrf_field()}}
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="no_equipment">NO Equipment</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_equipment" name="no_equipment" placeholder="No Asset"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="no_asset">NO Asset</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_asset" name="no_asset" placeholder="No Asset"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="description" >Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="mic" >MIC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mic" name="mic" placeholder="MIC"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="book_val" >Book Value</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="book_val" name="book_val" placeholder="Book Value"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="category" >Category</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="category" name="category" >
                            <option value="Unit">Unit</option>
                            <option value="Main Equipment">Main Equipment</option>
                            <option value="Accessories">Accessories</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="parent" >Parent</label>
                    <div class="col-sm-10">
                        <select type="text" class="form-control js-example-basic-single" id="parent" name="parent" placeholder="select Parent">
                            <option></option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="location" >Location</label>
                    <div class="col-sm-10">
                        <select type="text" class="form-control js-example-basic-single" id="location" name="location" placeholder="select Location">
                            <option></option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="condition" >Condition</label>
                    <div class="col-sm-10">
                        <select type="text" class="form-control" id="condition" name="condition">
                            <option value="Ready">Ready</option>
                            <option value="Not Ready">Not Ready</option>
                            <option value="Under Mtc">Under Mtc</option>
                            <option value="Idle">Idle</option>
                            <option value="On Job">On Job</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="figure" >Figure</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="figure" name="figure" placeholder="Max 500 kb"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="updateInvent" type="submit" onclick="updatetDataAsset()" class="btn btn-default" style="display: none;">Update</button>
                        <button id="storeInvent" type="submit" onclick="insertDataAsset()" class="btn btn-default">Save</button>
                        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- <div class="modal-footer">
                <button id="storeInvent" type="submit" onclick="insertData()" class="btn btn-default">Save</button>
                <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
              </div> -->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="exModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Input Filter</h4>
              </div>
              <div class="modal-body">
                <form id="formExcel"  method="POST" class="form-horizontal" role="form">
                    {{csrf_field()}}
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="location" >Location</label>
                    <div class="col-sm-10">
                        <select type="text" class="form-control js-example-basic-single" id="location" name="location" placeholder="select Location">
                            <option></option>
                            <option value="all">All</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="condition" >Condition</label>
                    <div class="col-sm-10">
                        <select type="text" class="form-control" id="condition" name="condition">
                            <option value="all">All</option>
                            <option value="1">Ready</option>
                            <option value="2">Not Ready</option>
                            <option value="3">Under Mtc</option>
                            <option value="4">Idle</option>
                            <option value="5">On Job</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="storeInvent" type="submit" onclick="getExcel()" class="btn btn-default">Download</button>
                        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- <div class="modal-footer">
                <button id="storeInvent" type="submit" onclick="insertData()" class="btn btn-default">Save</button>
                <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
              </div> -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        jQuery(function($) {

            var delet = '{{ (isset($delete) ? $delete : '' )}}';
            if (delet != ''){
                swal({
                      title: "Good job!",
                      text: "You have delete the record!",
                      icon: "success",
                    });
            }

            $.ajax({
                type: "GET",
                url: "{{ route('location.name') }}",
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                success: function(msg){
                    $.each(msg, function(key, val) {
                        $('#location').append("<option value='"+val.LOC_NAME+"'>"+val.LOC_NAME+"</option>");
                    })
                },
                error: function(msg){}
            });

            $.ajax({
                type: "GET",
                url: "{{ route('ortu.name') }}",
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                success: function(msg){
                    $.each(msg, function(key, val) {
                        $('#parent').append("<option value='"+val.ORTU+"'>"+val.ORTU+"</option>");
                    })
                },
                error: function(msg){}
            });

            $('.js-example-basic-single').select2();
            $('.select2').attr('width','450px');

            // editor = new $.fn.dataTable.Editor( {
            //     ajax: "../php/staff.php",
            //     table: "#pageTable",
            //     idSrc:  'NO_ASSET',
            //     fields: [ {
            //             label: "NOMOR ASSET:",
            //             name: "NO_ASSET"
            //         }, {
            //             label: "DESCRIPTION:",
            //             name: "DESCRIPTION"
            //         }, {
            //             label: "MIC:",
            //             name: "MIC"
            //         }, {
            //             label: "BOOK VALUE:",
            //             name: "BOOK_VALUE"
            //         }, {
            //             label: "CATEGORY:",
            //             name: "CATEGORY"
            //         }, {
            //             label: "PARENT:",
            //             name: "PARENT",
            //         }, {
            //             label: "LOCATION:",
            //             name: "LOCATION"
            //         }, {
            //             label: "CONDITIONS:",
            //             name: "CONDITIONS"
            //         }
            //     ]
            // } );

            // Activate an inline edit on click of a table cell
            // $('#pageTable').on( 'click', 'tbody td:not(:first-child)', function (e) {
            //     editor.inline( this, {
            //         buttons: { fn: function () { this.submit(); } }
            //     } );
            // } );

            $('#pageTable').DataTable({
                dom: "Bfrtip",
                processing: true,
                serverSide: true,
                ajax: '{!! route('table') !!}',
                display: "bootstrap",
                columns: [
                    {
                        searchable: false,
                        orderable: false,
                        "render": function (data, type, row, meta) {
                            return meta.settings._iDisplayStart + meta.row + 1;
                        },
                    },
                    { data: 'NO_EQUIPMENT', name: 'NO_EQUIPMENT' },
                    { data: 'NO_ASSET', name: 'NO_ASSET' },
                    { data: 'DESCRIPTION', name: 'DESCRIPTION' },
                    { data: 'MIC', name: 'MIC' },
                    { data: 'BOOK_VALUE', render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp ' )},
                    { data: 'CATEGORY', name: 'CATEGORY' },
                    { data: 'PARENT', name: 'PARENT' },
                    { data: 'LOCATION', name: 'LOCATION' },
                    { data: 'CONDITIONS', name: 'CONDITIONS' },
                    {
                        searchable: false,
                        orderable: false,
                        "render": function (data, type, row, meta) {
                            var link = "<a href='{{ URL::to('/') }}/images/"+row.FIGURE+"' >"+row.FIGURE+"</a>";

                            return link;
                        },
                    },
                    {
                        searchable: false,
                        orderable: false,
                        "render": function (data, type, row, meta) {
                            var edit = "<a class='pull-left button' style='margin-right: 4px' id='edit'><i class='fa fa-edit'  title='edit'></i></a>";
                            var dlt = '';
                            if (role == 'super-admin'){
                                var dlt = "<a onclick='delet(" + row.NO_EQUIPMENT + ")' class='pull-left button-red' style='margin-right: 4px' id='dlt'><i class='fa fa-trash'  title='delete'></i></a>";
                            }

                            // var filter = "<a class='pull-left button-red' onclick= 'filter()' style='margin-right: 4px' id='ff'>test</i></a>";
                            return edit+dlt;
                        },
                    },
                ],
                buttons: [
                    // { extend: "create", editor: editor },
                    // { extend: "edit",   editor: editor },
                    // { extend: "remove", editor: editor }
                ]
            });

            // validate file size
            $('#figure').bind('change', function() {
                var a=(this.files[0].size);
                if(a > 500000) {
                    var $validator = $("#formInput").validate();
                    var errors;

                    // Build up errors object, name of input and error message
                    errors = { figure: "File to big! max 500 kb" };
                    // Show errors on the form 
                    $validator.showErrors(errors);
                };
            });

            // show chart
            drawChart();
        });

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        function drawChart() {
            $.ajax({
                url     : "{{ route('data.table')}}",
                type    : "GET",
                dataType: "JSON",
                success : function(response){

                        chart(response);
                },
                error   : function(response){}
            });
        }

        function filter(){
            alert('tes');
            $('#pageTable').DataTable()
            .column( 2 )
            .data()
            .filter( function ( value, index ) {
                return value == 'compresor' ? true : false;
            } );
        }
    </script>
@endsection
@extends('layouts.master')

@section('content')
<div class="content-wrapper" style="height: auto;">
	<section class="content-header col-md-12">
            <div class="row">
                <h1>
                    Dashboard
                    <small>Location</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Location</li>
                    <a class="pull-right button" style="margin-top: -4px" data-toggle="modal" data-target="#locModal">Add New Data</a>
                </ol>
            </div>
        </section>

        <section class="content">
            <div class="row" style="margin-bottom: 15px">
                <div class="col-md-12">
                    <table id="tableLoc" class="table table-bordered table-hover stripe">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th class="loc">LOCATION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tbody id="dtLoc"></tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Modal -->
    <div id="locModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Input Data</h4>
              </div>
              <div class="modal-body">
                <form id="fLocation"  method="POST" class="form-horizontal" role="form">
                    {{csrf_field()}}
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="loc_name">Location Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="loc_name" name="loc_name" placeholder="Location Name"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Location Name"/>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="updateLoc" type="submit" onclick="updateData()" class="btn btn-default" style="display: none;">Update</button>
                        <button id="storeLoc" type="submit" onclick="insertData()" class="btn btn-default">Save</button>
                        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
	<div class='clearfix'></div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	jQuery(function($){
		$('#tableLoc').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('tableLocation') !!}',
                buttons: [
                    'copy', 'excel', 'pdf'
                ],
                columns: [
                    {
                        searchable: false,
                        orderable: false,
                        "render": function (data, type, row, meta) {
                            return meta.settings._iDisplayStart + meta.row + 1;
                        },
                    },
                    { data: 'LOC_NAME', name: 'LOC_NAME' },
                    {
                        searchable: false,
                        orderable: false,
                        "render": function (data, type, row, meta) {
                            var edit = "<a class='pull-left button' style='margin-right: 4px' id='edit'><i class='fa fa-edit'  title='edit'></i></a>";
                            var dlt = '';
                            if (role == 'super-admin'){
                                var dlt = "<a href='{{url('/delet-location/')}}/" + row.ID + "' class='pull-left button-red' style='margin-right: 4px' id='dlt'><i class='fa fa-trash'  title='delete'></i></a>";
                            }
                            return edit+dlt;
                        },
                    },
                ],
                columnDefs: [
                    { width: "20%", targets: 2 }
                ]
            }).ajax.reload();

		// $('#tableLoc').Tabledit({
		//     url: 'example.php',
		//     columns: {
		//         identifier: [0, 'id'],
		//         editable: [[1, 'LOC_NAME']]
		//     }
		// });
	});



	function insertData(){
            
            $("#fLocation").validate({
            ignore: [],
            debug:true,
            rules : {
                loc_name : "required",
            },
            messages : {
                loc_name : "number asset is required !",                    
            },
            errorElement: 'span',
            errorClass: 'help-block text-red',
            submitHandler: function() {
                fdata = new FormData($('form#fLocation')[0]);
                $.ajax({
                    type: "POST",
                    url: "{{ route('post.location') }}",
                    dataType: 'JSON',
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(msg){
                        var validator = {};
                        if (msg == '0'){
                            var $validator = $("#formInput").validate();
                            var errors;

                            /* Build up errors object, name of input and error message: */
                            errors = { no_asset: "Nomor asset sudah terdaftar" };
                            /* Show errors on the form */
                            $validator.showErrors(errors);
                        } else {
                        	$('#loc_name').val("");
                        	alert('data has been saved');
                            $('#tableLoc').DataTable().draw();
                        }
                    },
                    error: function(){
                        alert("failure");
                    }
                });
            }
        });
    }

    function updateData(){
            
            $("#fLocation").validate({
            ignore: [],
            debug:true,
            rules : {
                loc_name : "required",
            },
            messages : {
                loc_name : "number asset is required !",                    
            },
            errorElement: 'span',
            errorClass: 'help-block text-red',
            submitHandler: function() {
                fdata = new FormData($('form#fLocation')[0]);
                $.ajax({
                    type: "POST",
                    url: "{{ route('update.location') }}",
                    dataType: 'JSON',
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(msg){
                        var validator = {};
                        if (msg == '0'){
                            var $validator = $("#formInput").validate();
                            var errors;

                            /* Build up errors object, name of input and error message: */
                            errors = { no_asset: "Nomor asset sudah terdaftar" };
                            /* Show errors on the form */
                            $validator.showErrors(errors);
                        } else {
                            $('#loc_name').val("");
                            alert('data has been saved');
                            $('#tableLoc').DataTable().draw();
                        }
                    },
                    error: function(){
                        alert("failure");
                    }
                });
            }
        });
    }
</script>
	
@endsection
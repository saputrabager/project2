@extends('layouts.master')

@section('content')
<div class="content-wrapper" style="height: auto;">
	<section class="content-header col-md-12">
            <div class="row">
                <h1>
                    Dashboard
                    <small>Parent</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Parent</li>
                    <a class="pull-right button" style="margin-top: -4px" data-toggle="modal" data-target="#locModal">Add New Data</a>
                </ol>
            </div>
        </section>

        <section class="content">
            <div class="row" style="margin-bottom: 15px">
                <div class="col-md-12">
                    <table id="tableOrtu" class="table table-bordered table-hover stripe">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th class="loc">PARENT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tbody id="dtOrtu"></tbody>
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
                <form id="fOrtu"  method="POST" class="form-horizontal" role="form">
                    {{csrf_field()}}
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="ortu">Parent Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ortu" name="ortu" placeholder="Parent Name"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Parent Name"/>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="updateOrtu" type="submit" onclick="updateDataOrtu()" class="btn btn-default" style="display: none;">Update</button>
                        <button id="storeOrtu" type="submit" onclick="insertDataOrtu()" class="btn btn-default">Save</button>
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
		$('#tableOrtu').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('tableOrtu') !!}',
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
                    { data: 'ORTU', name: 'ORTU' },
                    {
                        searchable: false,
                        orderable: false,
                        "render": function (data, type, row, meta) {
                            var edit = "<a class='pull-left button' style='margin-right: 4px' id='edit'><i class='fa fa-edit'  title='edit'></i></a>";
                            var dlt = '';
                            if (role == 'super-admin'){
                                var dlt = "<a onclick='deletOrtu(" + row.ID + ")' class='pull-left button-red' style='margin-right: 4px' id='dlt'><i class='fa fa-trash'  title='delete'></i></a>";
                            }
                            return edit+dlt;
                        },
                    },
                ],
                columnDefs: [
                    { width: "20%", targets: 2 }
                ]
            });

		// $('#tableOrtu').Tabledit({
		//     url: 'example.php',
		//     columns: {
		//         identifier: [0, 'id'],
		//         editable: [[1, 'LOC_NAME']]
		//     }
		// });
	});
</script>
	
@endsection
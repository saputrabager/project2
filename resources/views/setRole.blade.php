@extends('layouts.master')

@section('content')
<div class="content-wrapper" style="height: auto;">
	<section class="content-header col-md-12">
            <div class="row">
                <h1>
                    Dashboard
                    <small>User</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Set Role</li>
                </ol>
            </div>
        </section>
	<section class="content">
        <div class="row" style="margin-bottom: 15px">
        </div>

        <div class="row">
        	<div class="col-md-12">
                <table id="userTable" class="table table-bordered table-hover stripe">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="dt-table"></tbody>
                </table>
            </div>
        </div>
    </section>

    <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Data</h4>
              </div>
              <div class="modal-body">
                <form id="formInput"  method="POST" class="form-horizontal" role="form">
                    {{csrf_field()}}
                    <div class="form-group">
                    	<label class="col-sm-2 control-label" for="name" >Name</label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" id="name" name="name" placeholder="Name"/>
	                    </div>
	                </div>
                  	<div class="form-group">
	                    <label class="col-sm-2 control-label" for="role-level" >Role level</label>
	                    <div class="col-sm-10">
                        <select type="text" class="form-control" id="role-level" name="role-level">
							<option value="User">User</option>
							<option value="Admin">Admin</option>
							<option value="super-admin">super-admin</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="UpdateUser" type="submit" onclick="updateDataRole()" class="btn btn-default">Update</button>
                        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
	
</div>
@endsection
@section('scripts')
<script>
	jQuery(function($) {
	$('.js-example-basic-single').select2();

	$('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('tableUser') !!}',
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
                    { data: 'name', name: 'name' },
                    { data: 'role', name: 'role' },
                    {
                        searchable: false,
                        orderable: false,
                        "render": function (data, type, row, meta) {
                            var edit = "<a class='pull-left button' style='margin-right: 4px' id='edit'><i class='fa fa-edit'  title='edit'></i></a>";
                            var dlt = '';
                            if (role == 'super-admin'){
                                var dlt = "<a href='{{url('/delet-role/')}}/" + row.ID + "' class='pull-left button-red' style='margin-right: 4px' id='dlt'><i class='fa fa-trash'  title='delete'></i></a>";
                            }
                            return edit+dlt;
                        },
                    },
                ],
            }).ajax.reload();
	});
</script>
@endsection
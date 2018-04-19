@extends('layouts.master')

@section('content')
<div class="content-wrapper" style="height: auto;">
	<section class="content-header col-md-12">
            <div class="row">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Set Role</li>
                </ol>
            </div>
        </section>
	<section class="content">
        <div class="row" style="margin-bottom: 15px">
            <div class="col-md-12">
            	<div class="col-md-6">
            		<label>select user</label>
	            	<select class="form-control">
						@foreach ($users as $user)
						<option>{{$user['name']}}</option>
						@endforeach
					</select>
            	</div>
            	<div class="col-md-6">
            		<label>select user</label>
	            	<select class="form-control">
						<option>User</option>
						<option>Admin</option>
						<option>SuperAdmin</option>
					</select>
            	</div>
            	
            </div>
        </div>

        <div class="row">
        	<div class="col-md-12">
                <table id="userTable" class="table table-bordered table-hover stripe">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>User</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody id="dt-table"></tbody>
                </table>
            </div>
        </div>
    </section>
	
</div>
@endsection
@section('script')
<script type="text/javascript">
	$('.form-control').select2();
</script>
@endsection
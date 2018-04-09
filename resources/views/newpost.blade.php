@extends('layouts.app')

@section('content')
<div class="container">
	<div class="form1">
		{!! Form::open([ 'route'=>'data.upload.post','class'=>'form-inline']) !!}
		{!! csrf_field() !!}
			<div style="width:425px; margin: 0 auto">
				<div class="form-group">
					<label for="p_title" class="labelpost" >Title</label>
					<input class="form-control" type="text" name="p_title">
					@if ($errors->has('p_title'))
                		<span class="text-danger">{{ $errors->first('p_title') }}</span>
            		@endif
				</div>
				<div class="form-group">
					<label for="p_decs" class="labelpost">Description</label>
					<textarea class="form-control" rows="3" cols="30" type="text" name="p_decs"></textarea>
					@if ($errors->has('p_decs'))
                		<span class="text-danger">{{ $errors->first('p_decs') }}</span>
            		@endif
				</div>
				<div class="form-group">
					<label for="location" class="labelpost">Location</label>
					<input class="form-control" type="text" name="location">
					@if ($errors->has('location'))
                		<span class="text-danger">{{ $errors->first('location') }}</span>
            		@endif
				</div>
				<div class="form-group">
					<label for="address" class="labelpost">Address {{$data}}</label>
					<textarea class="form-control" rows="3" cols="30" type="text" name="address"></textarea>
				</div>
				<div class="form-group">
					<label for="room" class="labelpost">Room</label>
					<input class="form-control" size="1" maxlength="1" type="text" name="room" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
				</div>
				<div class="form-group">
					<label for="bathroom" class="labelpost">Bathroom</label>
					<input id="t-bath" type="checkbox" value="">
					<input class="form-control" size="1" maxlength="1" type="text" name="bathroom" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
				</div><br>
				<div class="form-group">
					<label for="kitchen" class="labelpost">Kitchen</label>
					<input id="t-kitchen" type="checkbox" value="">
					<input id="i-kitchen" class="form-control hidden" size="1" maxlength="1" type="text" name="kitchen" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
				</div><br>
				<div class="form-group">
					<label for="garage" class="labelpost">Garage</label>
					<input id="t-garage" type="checkbox">
					<input id="i-garage" style="display:none;" class="form-control" value="" size="1" maxlength="1" type="text" name="garage" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
				</div>
				<div class="form-group">
  					<label for="sel1" class="labelpost">Payment</label>
					<select class="form-control" name="payment">
						<option value="monthly">Bulanan</option>
						<option value="yearly">Tahunan</option>
					</select>
					@if ($errors->has('payment'))
                		<span class="text-danger">{{ $errors->first('payment') }}</span>
            		@endif
				</div>
				<div class="form-group">
  					<label for="type" class="labelpost">type</label>
					<select class="form-control" name="type">
						<option value='petak'>petak</option>
						<option value="rumah">rumah</option>
					</select>
					@if ($errors->has('payment'))
                		<span class="text-danger">{{ $errors->first('payment') }}</span>
            		@endif
				</div>
				<div class="form-group">
					<label for="cost" class="labelpost">Cost</label>
					<input class="form-control" type="text" name="cost" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
					@if ($errors->has('cost'))
                		<span class="text-danger">{{ $errors->first('cost') }}</span>
            		@endif
				</div>
				<div style="display:none">
					<label for="cost" class="labelpost">user id</label>
					<input class="form-control" type="text" name="user_id" value="{{ Auth::user()->username }}">
				</div>
				<button type="submit" class="btn btn-primary">Selesai</button>
			</div>
		{!! Form::close() !!}
	</div>
</div>

<script type="text/javascript">

</script>
@endsection
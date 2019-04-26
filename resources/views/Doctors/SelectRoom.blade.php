@extends('ClinicLayout.Main')
@section('tittle','selectroom')
@section('content')
<div class="container" style="margin-top: 5%;">
	<div class="row">
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<div class="card-block">
						<div class="form-group">
							<form method="GET" action="{{route('Doctors.SelectRoom')}}">
								<label for="room_name">Select Room</label>
								<select class="form-control" id="room_name" name="room">
									@foreach($room as $single)
									<option>{{$single->room_name}}</option>
									@endforeach
								</select><br>
								<button class="btn btn-primary" type="submit">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
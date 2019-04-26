@extends('Registerar.Home')
@section('Sub_Content')
@parent
<div class="container">
	<div class="row">
		<div class="col-md-4" style="margin-top: 10%;">
			<div class="form-group">
				<form method="post" action="{{route('Registerar.ImageUpdated',['id'=>$id])}}" enctype="multipart/form-data">
					@csrf
					<input type="file" name="photo" >
					<input type="submit" name="submit" value="update">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('Doctors.Home')
@section('Sub_Content')
@parent
<div class="container">
	 <div class="container" style="width: 30em;margin-top: 5%;">
	 	<div class="card card-block">
	 		<div class="card-header">
	 			<span class="text-info text-center">Labratory instruction Paper</span>
	 		</div>
	 		<div class="card-body">
	 			<div class="form-group">
	 				<form method="GET" action="{{route('Doctors.Send_To_Labratory',['doctor_id'=>Auth::guard('Doctors')->user()->username,'clinic_id'=>$clinic_id])}}">
	 					<label for="Labratory_Instruction">write here</label>
	 					<textarea class="form-control" name="Labratory_Instruction" id="Labratory_Instruction"></textarea><br>
	 					<button class="btn btn-success">Send</button>
	 				</form>
	 			</div>
	 		</div>
	 	</div>
	 </div>
</div>
@endsection
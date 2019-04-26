@extends('Doctors.Home')
@section('Sub_Content')
@parent
<div class="container" style="margin-top: 3%;">
	<div class="form-group">
		<form method="POST" action="{{route('Doctors.Submit_Result',['usrname'=>$username,'clinic_id'=>$clinic_id])}}">
			@csrf
			<label for="add_patient_result">Your result or Patient Sign</label>
			<textarea class="form-control" style="width: 40rem;height: 20rem;" id="add_patient_result" name="Patient_Data" autofocus="autofocus">
			</textarea><br>
			<button class="btn btn-outline-success" type="submit">Add</button>
		</form>
	</div>
</div>
@endsection
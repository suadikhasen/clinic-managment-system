@extends('Doctors.Home')
@section('Sub_Content')
@parent
<div class="container" style="margin-top: 5%">
	@if(count($patient_data)>0)
	@foreach($patient_data as $patient)
	 <div class="row justify-content-center">
	 	<div class="col col-md-8">
	 		<div class="card card-info">
	 			 <div class="card-header">
	 			 	<span class="text-info">result for patient</span> {{$patient_info->first_name.' '.$patient_info->last_name.' '}} <span class="text-info">on </span>{{$patient->created_at}}
	 			 </div>
	 			 <div class="card-body">
	 			 	<div class="card-text text-center">
	 			 		{{$patient->patient_result}}
	 			 	</div>
	 			 </div>
	 			 <div class="card-footer"><span class="text-info">written by {{App\Doctors::find($patient->doctor_id)->full_name}}</span></div>
	 		</div>
	 		<br>
	 	</div>
	 </div>
	@endforeach
	<a href="{{route('Doctors.Add_Patient_result',['username'=>$doctor_info->username,'clinic_id'=>$patient_info->clinic_id])}}" class="btn btn-outline-info btn-block" style="margin-bottom: 3%;">Add Your own</a>
	@else
	<p class="text-info">This Patient is new  to this clinic</p>
	<a href="{{route('Doctors.Add_Patient_result',['username'=>$doctor_info->username,'clinic_id'=>$patient_info->clinic_id])}}">Add your Result</a>

	@endif
</div>

@endsection
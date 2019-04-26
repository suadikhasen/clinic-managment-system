@extends('Doctors.Home')
@section('Sub_Content')
@parent
<div class="container" style="margin-top: 10px;">
	@if(Session::has('Message_Success'))
	 <div class="alert alert bg-success text-white ">
	 	{{Session::get('Message_Success')}}
	 </div>
	@endif

	@if(Session::has('Message_Warning'))
	 <div class="alert text-center bg-danger">
	 	{{Session::get('Message_Warning')}}
	 </div>
	@endif

	<div class="row">
		<div class="col-9" >
			<div class="list-group list-unstyled" class="mr-2">
				@if(count($Patient_List)>0)
				  @foreach($Patient_List as $Patient)
				   <div class="list-group-item">{{$Patient->first_name.' '.$Patient->last_name.' '.$Patient->grand_name}}
				   	<span class="badge badge-default" style="float: right; margin-right: 5px;"><a href="{{route('Doctors.View_Patient_Data',['id1'=>Auth::guard('Doctors')->user()->username,'id2'=>$Patient->clinic_id])}}" class="btn btn-light">View</a></span>
				   	
                   <span class="badge badge-default" style="float: right; margin-right: 5px;"><a href="{{route('Doctors.Show_Medicine_Paper',['clinic_id'=>$Patient->clinic_id])}}" class="btn btn-light">Send To Phermacy</a></span>

                   <span class="badge badge-default" style="float: right; margin-right: 5px;"><a href="{{route('Doctors.Labratory_Paper',['clinic_id'=>$Patient->clinic_id])}}" class="btn btn-light">Send To Labratory</a></span>
				   	

				   	
                  <span class="badge badge-default" style="float: right; margin-right: 5px;"><a  href="{{route('Doctors.Finish_Result',['clinic_id'=>$Patient->clinic_id])}}" class="btn btn-light">finished</a></span>
				   	

				   </div>
				@endforeach
			</div>
			<br>
			<div>
				{{$Patient_List->links()}}
				<span class="text-info" style="float: right;">Total Number Of Patients {{$patient_number}} </span>
			</div>
			@else
			No Patient Now!!
			@endif
		</div>
	</div>
</div>

@endsection
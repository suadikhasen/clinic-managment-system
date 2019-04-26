@extends('Phermacy.Home')
@section('Sub_Content')
@parent
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="list-group list-unstyled">
			 @if(!empty($patient_list))
                @foreach($patient_list as $patient)
				 <div class="list-group-item">
				 	{{$patient->first_name.'  '.$patient->last_name}}
				 	<a href="{{route('Phermacy.Show_Medical_Instruction',['clinic_id'=>$patient->clinic_id])}}" class="btn btn-success" style="float: right;">See</a>
				 </div>
				@endforeach
			 @endif	
			</div>
			{{$patient_list->links()}}
		</div>
	</div>
</div>
@endsection
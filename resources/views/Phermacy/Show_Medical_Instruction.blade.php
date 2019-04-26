@extends('Phermacy.Home')
@section('Sub_Content')
@parent
<div class="container">
	<div class="card card-block mt-5" style="width: 20rem;">
		<div class="card-header text-info">
			Medical Result
		</div>
		<div class="card-body">
			<div class="card-text">
				{{$patient_data->ins_fr_do_to_pher}}
			</div>
		</div>
	</div><br>
	<a href="{{route('Phermacy.Finish_Patient',['clinic_id'=>$patient_data->clinic_id])}}" class="btn btn-link">finish</a>
</div>
@endsection
@extends('Labratory.Home')
@section('Sub_Content')
@parent
<div class="container mt-2">
	<div class="row offset-md-2">
		<div class="col-md-8">
			<div class="card card-block" style="width: 20rem;">
			<div class="card-header text-info text-center">
				Labratory Instruction
			</div>
			<div class="card-body">
				<div class="card-info">
					{{$show_data->ins_fr_do_lab}}
				</div>
			</div>
			<div class="card-footer">
				Send By{{ "  ".App\Doctors::find($show_data->doctor_id)->full_name}} on {{"  ".$show_data->created_at}}
			</div>
		</div><br>
		<a href="{{route('Labratory.Add_Patient_Result',['username'=>Auth::guard('Labratory')->user()->username,'clinic_id'=>$show_data->clinic_id])}}">Add Your Result</a><br>

        <a href="{{route('Labratory.Finish',['username'=>Auth::guard('Labratory')->user()->username,'clinic_id'=>$show_data->clinic_id])}}">finish</a>
		</div>
		
	</div>
</div>
@endsection
@extends('Labratory.Home')
@section('Sub_Content')
@parent
<div class="container mt-3">
	<div class="row">
		<div class="col-md-6">
			<div class="card card-block">
				<div class="card-header text-info text-center">Labratorist Response Paper</div>
				<div class="card-body">
					<div class="form-group">
						<form method="GET" action="{{route('Labratory.Submit_Result',['Labratorist_id'=>$Labratorist_id,'clinic_id'=>$clinic_id])}}">
							<label for="Labratorist">Write Labratory Result</label>
							<textarea  id="Labratorist" name="result" class="form-control"></textarea><br>
							<button class="btn btn-success" type="submit">Add</button>
						</form>
					</div><br>
                    
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
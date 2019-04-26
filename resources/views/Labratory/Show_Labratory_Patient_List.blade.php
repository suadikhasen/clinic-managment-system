@extends('Labratory.Home')
@section('Sub_Content')
@parent
<div class="container">
	<div class="row">
		<div class="col-md-9 mt-1">
			@if(Session::has('message_success'))
			 <div class="alert alert-success bg-success text-white">
			 	{{Session::get('message_success')}}
			 </div>
			 @elseif(Session::has('message_warning'))
			  <div class="alert alert-warning bg-warning">
			 	{{Session::get('message_warning')}}
			 </div>
			@endif
			@if(count($Patient_List)>0)
			<div class="list-group list-unstyled">
				@foreach($Patient_List as $Patient)
				 <div class="list-group-item m-1">
				 	{{$Patient->first_name." ".$Patient->last_name." ".$Patient->grand_name}}
				 	<a href="{{route('Labratory.Show_Patient_Data',['username'=>Auth::guard("Labratory")->user()->username,'clinic_id'=>$Patient->clinic_id])}}" class="btn btn-success  float-right" >See</a>
				 </div>
				@endforeach
			</div><br>
             {{$Patient_List->links()}}
			@else
			NO Patient Know !!
			@endif
		</div>
	</div>
</div>
@endsection
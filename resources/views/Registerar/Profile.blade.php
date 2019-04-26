@extends('Registerar.Home')
@section('Sub_Content')
@parent
<div class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<div class="card">
				<div class="card-header text-center">
					Profile
				</div>
				<div class="card-body" style="height: auto;">
					<img src="{{asset('storage/'.Auth::guard('Registerar')->user()->photo)}}" class="rounded-circle card-img-top " style="width: 40%; height: 40%;" alt="user photo">

					<ul class="list-group list-unstyled">
						<li class="list-group-item"><b>Full Name</b><span class="badge" style="float: right;">{{Auth::guard('Registerar')->user()->full_name}}</span></li>

						<li class="list-group-item"><b>E-mail</b><span class="badge" style="float: right;">{{Auth::guard('Registerar')->user()->email}}</span></li>

						<li class="list-group-item"><b>Username</b><span class="badge" style="float: right;">{{Auth::guard('Registerar')->user()->username}}</span></li>
						
						<li class="list-group-item"><b>Graduated_in</b><span class="badge" style="float: right;">{{Auth::guard('Registerar')->user()->graduated_college_university}}</span></li>

						<li class="list-group-item"><b>Area of Studies</b><span class="badge" style="float: right;">{{Auth::guard('Registerar')->user()->graduated_area}}</span></li>

						<li class="list-group-item"><b>sex</b><span class="badge" style="float: right;">{{Auth::guard('Registerar')->user()->sex}}</span></li>

						<li class="list-group-item"><b>Age</b><span class="badge" style="float: right;">{{Auth::guard('Registerar')->user()->age}}</span></li>

						<li class="list-group-item"><b>graduated_status</b><span class="badge" style="float: right;">{{Auth::guard('Registerar')->user()->graduated_status}}</span></li>
					</ul>
					<br>
					<a href="{{route('Registerar.ChangeProfile',['id'=>Auth::guard('Registerar')->user()->username])}}" class="btn btn-outline-success m-auto card-link">Edit</a>
				</div>	
			</div>
		</div>
	</div>
@endsection
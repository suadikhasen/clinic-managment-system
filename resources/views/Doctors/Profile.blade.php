@extends('Doctors.Home')
@section('Sub_Content')
@parent
<div class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<div class="card">
				<div class="card-header text-center">
					Profile
				</div>
				<div class="card-body">
					<img src="{{asset(Auth::guard('Doctors')->user()->photo)}}" class="rounded-circle card-img-top " style="width: 40%; height: 40%;" alt="user photo">

					<ul class="list-group list-unstyled">
						<li class="list-group-item"><b>Full Name</b><span class="badge" style="float: right;">{{Auth::guard('Doctors')->user()->full_name}}</span></li>

						<li class="list-group-item"><b>E-mail</b><span class="badge" style="float: right;">{{Auth::guard('Doctors')->user()->email}}</span></li>

						<li class="list-group-item"><b>Username</b><span class="badge" style="float: right;">{{Auth::guard('Doctors')->user()->username}}</span></li>
						
						<li class="list-group-item"><b>Graduated_in</b><span class="badge" style="float: right;">{{Auth::guard('Doctors')->user()->graduated_college_university}}</span></li>

						<li class="list-group-item"><b>Area of Studies</b><span class="badge" style="float: right;">{{Auth::guard('Doctors')->user()->graduated_area}}</span></li>

						<li class="list-group-item"><b>sex</b><span class="badge" style="float: right;">{{Auth::guard('Doctors')->user()->sex}}</span></li>

						<li class="list-group-item"><b>Age</b><span class="badge" style="float: right;">{{Auth::guard('Doctors')->user()->age}}</span></li>

						<li class="list-group-item"><b>graduated_status</b><span class="badge" style="float: right;">{{Auth::guard('Doctors')->user()->graduated_status}}</span></li>
					</ul>
				</div>	
			</div>
		</div>
	</div>
@endsection
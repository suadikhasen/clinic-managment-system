@extends('ClinicLayout.Main')
@section('tittle','Registerar')
@section('content')
<div class="container-fluid">
  
	@section('Sub_Content')
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <p class="navbar-brand nav-item m-auto">Astu Cms</p>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('Home')}}">Home<span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
    <button class="nav-tabs" id="Patient_Tab" style="margin-right: 20rem;">Add Patient</button>
    <form class="form-inline mr-auto" method="GET" action="{{route('Registerar.Search_Patient',['id'=>Auth::guard('Registerar')->user()->username])}}">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" autofocus name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="mr-5 dropdown">
    	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{Auth::guard('Registerar')->user()->username}}</span>
          <i class="fas fa-user"></i>
    	
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('Registerar.LogOut',['id'=>Auth::guard('Registerar')->user()->username])}}">LogOut</a>
          <a class="dropdown-item" href="{{route('Registerar.Profile',['id'=>Auth::guard('Registerar')->user()->username])}}">Profile</a>
    </div>
  </div>
</nav>

</div>
<div class="row" id="Patient_Submitter" style="display: none;">
  <div class="container">
    <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <p>Add Patient</p>
      </div>
        <div class="card-body">
          <form method="GET" action="{{route('Registerar.Add_Patient')}}">
            <div class="form-group">

              <label for="first_name">First Name</label>
              <input type="text" name="first_name" id="first_name" class="form-control" placeholder="first_name" autofocus="autofocus">

              <label for="last_name">Last Name</label>
              <input type="text" name="last_name" id="last_name" class="form-control" placeholder="last_name" autofocus>

              <label for="grand_name">Grand Name</label>
              <input type="text" name="grand_name" id="grand_name" class="form-control" placeholder="grand_name" autofocus>

              <label for="age">Age</label>
              <input type="text" name="age" id="age" class="form-control" placeholder="age" autofocus> 
              <label for="sex">Sex</label>
              <select class="form-control" id="sex" name="sex">
                <option>male</option>
                <option>female</option>
              </select>

              <button type="submit" class="btn btn-primary" style="margin-top:10px;float: right;">Add</button>
            </div>
          </form>
          
        </div>
    </div>
  </div> 
  </div>
</div>
@if($errors->any())
  @foreach($errors->all() as $error)
   <div class="alert-warning bg-danger" style="text-align: center;">
     {{$error}}
   </div>
  @endforeach
@endif

@if(Session::has('message_success'))
 <div class="alert bg-success" style="text-align: center;">{{Session::get('message_success')}}</div>
@endif

@if(Session::has('message_warning'))
 <div class="alert-warning bg-danger" style="text-align: center;">{{Session::get('message_warning')}}</div>
@endif

@if(!empty($Patient))
 @component('ClinicLayout.card',[
  'source'=>$Patient->photo_path,
  'name'=>$Patient->first_name,
  'lastname'=>$Patient->last_name,
  'age'=>$Patient->age,
  'sex'=>$Patient->sex,
  'clinicid'=>$Patient->clinic_id,
  'Send_To_Room'=>'Registerar.Send_Patient',
  'Link'=>'Send To Patient Room',
  'id1'=>'id1',
  'user_id'=>Auth::guard('Registerar')->user()->username,
  'id2'=>'id2',
  'patient_id'=>$Patient->clinic_id,
  
  ]);

 @endcomponent
@endif

<script type="text/javascript">
  jQuery(document).ready(function() {
    $("#Patient_Tab").click(function() {
      $("#Patient_Submitter").slideToggle("fast");
    });
    
  });
</script>

@show
@endsection
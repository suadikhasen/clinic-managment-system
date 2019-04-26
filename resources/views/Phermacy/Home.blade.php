@extends('ClinicLayout.Main')
@section('tittle','Phermacy')
@section('content')
<div class="container-fluid">
	@section('Sub_Content')
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <p class="navbar-brand " style="margin: auto;" >Astu Cms</p>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('Home')}}">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('Phermacy.Show_Patient_List')}}">TodayPatient<span class="badge badge-info" style="float: right;">{{$patient_number}}</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline mr-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="mr-5 dropdown">
    	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{Auth::guard('Phermacy')->user()->username}}</span>
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('Phermacy.LogOut',['id'=>Auth::guard('Phermacy')->user()->username])}}">LogOut</a>
          <a class="dropdown-item" href="{{route('Phermacy.Profile',['id'=>Auth::guard('Phermacy')->user()->username])}}">Profile</a>
    </div>
  </div>
</nav>
@show
</div>
@endsection
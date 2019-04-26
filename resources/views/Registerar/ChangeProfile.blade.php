@extends('Registerar.Home')
@section('Sub_Content')
@parent
@component('ClinicLayout.Profile',[
	'id'=>'id',
	'content'=>$Data->username,
	'image_link'=>'Registerar.UpdateImage',
	'image_id'=>'image_id',
	'image_content'=>$Data->username,
	'route'=>'Registerar.UpdateProfile',
	'photo'=>$Data->photo,
	'full_name'=>$Data->full_name,
	'username'=>$Data->username,
	'graduated_status'=>$Data->graduated_status,
	'graduated_college_university'=>$Data->graduated_college_university,
	'email'=>$Data->email,
	'graduated_area'=>$Data->graduated_area,
	'passwordlink'=>"Registerar.Show_Password_Template",
	'password_id'=>'password_id',
	'password_content'=>$Data->username
	])
	<button type="submit" class="btn btn-outline-secondary">Save</button>

@endcomponent

@endsection
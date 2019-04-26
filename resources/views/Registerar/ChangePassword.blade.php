@extends('Registerar.Home')
@section('Sub_Content')
@parent
@component('ClinicLayout.PasswordTemplate',[
    'route'=>'Registerar.ChangePassword',
    'username'=>'id',
    'username_content'=>$id

	])
Change
@endcomponent
@endsection
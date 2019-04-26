@extends('ClinicLayout.Main')
@section('Tittle','Log in Page')
@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 10%;">
        <div class="col-md-6">
            @if(Session::has('Invalid'))
             <div class="alert alert-danger">
                {{Session::get('Invalid')}}
            </div>
            @endif
            @if(Session::has('Success'))
             <div class="alert alert-success">
                {{Session::get('Success')}}
            </div>
            @endif
            @if(Session::has('DeniedMessage'))
             <div class="alert alert-warning">
                {{Session::get('DeniedMessage')}}
            </div>
            @endif
            <div class="card">
            <div class="card-header">
                LogIn
            </div>
            <div class="card-body">
                <div class="form-group ">
                    <form method="POST" action="{{route('Login')}}">
                        @csrf
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required autofocus="autofocus" placeholder="username" value="{{old('value')}}"><br>
                        <label for="password">Password</label>
                        <input type="password" name="password"  class="form-control" placeholder="password" required><br>
                        <button type="submit" class="btn btn-primary">LogIn</button>
                        <div class="card-body" style="text-align: right;"><a class="card-link" href="#">Forgot Your Password ?</a></div>
                    </form> 
                </div> 
            </div>
        </div>
        </div>
    </div>   
</div> 
@endsection
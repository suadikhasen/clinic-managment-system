<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
	<script type="text/javascript" src="{{asset('/bootstrap/js/jquery-3.3.1.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('/font/css/all.css')}}">
	<style type="text/css">
		#card_image{
			height: 30%;
			width: 30%;
			background:royalblue;
		}
		.container{
			margin-top: 5%;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="card">
				<div class="card-header text-center">Astu Cms</div>
				<div class="card-body">
					<div><img src="{{asset($source)}}" class="rounded-circle card-img-top" id="card_image"></div>
					<div class="card-info">Name:{{$name}}</div>
					<div class="card-info">Last Name:{{$lastname}}</div>
					<div class="card-info">Age: {{$age}}</div>
					<div class="card-info">Clinic_id:{{$clinicid}}</div>
					<div class="card-info">Sex:{{$sex}}</div>
					<div class="card-footer"><a href="{{route($Send_To_Room,[$id1=>$user_id,$id2=>$patient_id])}}" class="card-link">{{$Link}}</a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
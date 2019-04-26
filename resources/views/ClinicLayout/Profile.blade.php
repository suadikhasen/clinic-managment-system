
<div class="container">
	<div class="row">
     <div class="col-md-5 col-sm-12">
     	<div class="card card-outline-info" style="width: 18rem;">
     		<div class="card-body">
     			<div class="form-group card-block">
     				<img src="{{asset('storage/'.$photo)}}" class="card-img-top rounded-circle" style="width: 30%;height: 30%;" alt="usr photo">
     				<a href="{{route($image_link,[$image_id=>$image_content])}}">Change Photo</a>
     				<form method="POST" action="{{route($route,[$id=>$content])}}">
     					@csrf
     					 <label for="full_name">Full_Name:</label>
     					 <input type="text" name="full_name" class="form-control" value="{{$full_name}}"><br>
     					 <label for="username">Username</label>
     					 <input type="text" name="username" class="form-control" id="username" value="{{$username}}"><br>

     					 <label for="graduated_status">Graduated_Status</label>
     					 <input type="text" name="graduated_status" id="graduated_status" class="form-control" value="{{$graduated_status}}"><br>



     					 <label for="graduated_college_university">Graduated_College</label>
     					 <input type="text" name="graduated_college_university" id="graduated_college_university" value="{{$graduated_college_university}}" class="form-control"><br>

     					 <label for="email">E-Mail</label>
     					 <input type="text" name="email" id="email" class="form-control" value="{{$email}}"><br>
                         

                         <label for="gaduated_area">Graduated_Area</label>
                         <input type="text" name="graduated_area" class="form-control" value="{{$graduated_area}}" id="graduated_area"><br>

                         {{$slot}}<br>

                         <a href="{{route($passwordlink,[$password_id=>$password_content])}}" style="float: right;">Change Password</a>
     				</form>
     			</div>
     		</div>
     	</div>
     </div>
	</div>
</div>

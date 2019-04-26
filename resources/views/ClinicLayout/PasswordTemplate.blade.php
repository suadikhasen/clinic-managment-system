<div class="container" style="margin-top: 5%;">
	<div class="row">
		<div class="col-md-5 offset-2">
			<div class="card">
				<div class="card-body">
					<div class="card-block">
						<div class="form-group">
							<form method="POST" action="{{route($route,[$username=>$username_content])}}">
                                 @csrf
								<label for="current_password">Current Password</label>
								<input type="password" name="current_password" id="current_password" class="form-control" autofocus="autofocus" placeholder="current_password"><br>

								<label for="new_password">New Password</label>
								<input type="password" name="new_password" id="new_password" class="form-control" placeholder="new_password"><br>

								<label for="confrim_password">Confrim Password</label>
								<input type="password" name="confrim_password" id="confrim_password" class="form-control" placeholder="confrim_password"><br>

								<button type="submit" class="btn btn-outline-primary">{{$slot}}</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

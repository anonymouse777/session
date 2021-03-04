@extends('layout')


@section ('pageTitle')
	Sign Up
@endsection


@section ('pageBody')

	<div class="form_width">
		<h2 class="text-center text-primary">Create Account</h2>
		<form method="post" action="/register" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="User Name">
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" >
			</div>
			<div class="form-group">
				Profile Image<br>
				<input type="file" accept=".jpg, .png |image" name="user_image">
		  	</div>
			<div class="form-group">
				<button class="form-control btn btn-primary btn-lg" type="submit">Sign Up</button>
			</div>
		</form>
		<p class="text-center">Already have an account? <a href="\login">Sign in</a></p>
		</form>
	</div>

@endsection
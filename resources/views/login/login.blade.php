@extends('layout')


@section ('pageTitle')
	Sign in
@endsection


@section ('pageBody')

	<div class="form_width">
		<h2 class="text-center text-primary">Sign in</h2>
		<form method="post" action="/login">
			@csrf
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" >
			</div>
			<div class="form-group">
				<button class="form-control btn btn-primary btn-lg" type="submit">Sign in</button>
			</div>
		</form>
		<p class="text-center">Don't have an account? <a href="\register">Sign up</a></p>
		@if (session('message'))
				<p class="text-danger"> {{ session('message') }}</p>
			@endif
	</div>

@endsection
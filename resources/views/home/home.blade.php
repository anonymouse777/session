@extends('layout')


@section ('pageTitle')
	Articles List
@endsection


@section ('pageBody')
	<!-- <p> <button class="float-right btn btn-primary mt-4">
		<img src="/user_image/default.jpg" height="25px" width="25px"> {{ $username }}
	</button></p> -->

	<div class="dropdown">
		<button class="float-right mt-4 btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<img src="/user_image/{{ $image }}" height="25px" width="25px"> {{ $username }}
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item" href="/home">Home</a>
			<a class="dropdown-item" href="#">Profile</a>
			<a class="dropdown-item" href="/home/create">Create New Article</a>
			<a class="dropdown-item" href="/home/publication">My Publications</a>
			<a class="dropdown-item" href="/logout">Logout</a>
		</div>
	</div>

	<h1 class="text-center text-primary p-3">All Articles</h1>

	<div class="text-left">
		@foreach($articles ?? '' as $article )
			<div class="article_width">

				<h4 class="text-center text-secondary">
                    <a href="/home/{{ $article->title }}">{{ $article->title }}</a>
                </h4>
			</div>
		@endforeach
	</div>
	

@endsection
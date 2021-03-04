@extends('layout')


@section ('pageTitle')
	Create Article
@endsection


@section ('pageBody')

	<div class="dropdown">
        <button class="float-right mt-4 btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="/user_image/default.jpg" height="25px" width="25px"> {{ $username }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        	<a class="dropdown-item" href="/home">Home</a>
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="/home/create">Create New Article</a>
            <a class="dropdown-item" href="/home/publication">My Publications</a>
            <a class="dropdown-item" href="/logout">Logout</a>
        </div>
    </div>

    <br>

	<div class="article_form_width">
		<h2 class="text-center text-primary">Create A New Article</h2>
		<form method="post" action="/home/create">
			@csrf
			<div class="form-group">
				<input type="text" name="title" class="form-control" placeholder="Article Title" required>
			</div>
			<div class="form-group">
				<textarea name="paragraph" placeholder="Enter a Paragraph" rows="7" class="form-control" required></textarea>
			</div>
			<!-- <div class="form-group">
				Select Image for your Article<br>
				<input type="file" accept=".jpg, |image" name="article_image" required>
		  	</div> -->
			<div class="form-group">
				<button class="form-control btn btn-primary btn-lg" type="submit">Publish Article</button>
			</div>
		</form>
	</div>

@endsection
@extends('layout')


@section ('pageTitle')
    Article
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
    
    <div class="text-left">
        <div class="article_width guest_margin">
            <h4 class="text-center text-secondary border-bottom border-secondary">{{ $article->title }}</h4>
            <p class="px-3 space_preserve"> {{ $article->paragraph }} </p>
            <p class="px-3">Article posted by <b>{{ $article->user() }}</b></p>
        </div>
    </div>

    <div class="article_width">
        <h4 class="text-center text-primary">All Comments</h4>
        @forelse ($comments as $comment)
            <p><b>{{ $comment->username() }} : </b> {{ $comment->comment }}</p>
        @empty
            <p>No comment for this post yet.</p>

        @endforelse
    </div>
    <div class="article_width">
        <h4>Leave a comment</h4>
        <form method="post" action="/home/{{ $article->title }}">
            @csrf
            <div class="form-group">
                <textarea rows="2" class="form-control" placeholder="Add comment" name="comment" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary btn-lg">comment</button>
            </div>
        </form>
    </div>

@endsection
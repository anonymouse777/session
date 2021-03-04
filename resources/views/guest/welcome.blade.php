@extends('layout')


@section ('pageTitle')
    Articles List
@endsection


@section ('pageBody')
    <p>
        <a href="/register">
            <button class="float-right btn btn-primary mt-4 ml-4">Register</button>
        </a>
        <a href="/login">
            <button class="float-right btn btn-primary mt-4">Login</button>
        </a>
    </p>
    <h1 class="text-center text-primary p-3">All Articles</h1>

    <div class="text-left">
        @foreach($articles ?? '' as $article )
            <div class="article_width">
                <h4 class="text-center text-secondary">
                    <a href="/guest/{{ $article->title }}">{{ $article->title }}</a>
                </h4>
            </div>
        @endforeach
    </div>

@endsection
@extends('layout')


@section ('pageTitle')
    Article
@endsection


@section ('pageBody')
    <p>
        <a href="/register">
            <button class="float-right btn btn-primary mt-0 ml-4">Register</button>
        </a>
        <a href="/login">
            <button class="float-right btn btn-primary mt-0">Login</button>
        </a>
    </p>
    <br>
    <div class="text-left">
        <div class="article_width guest_margin">
            <h4 class="text-center text-secondary border-bottom border-secondary">{{ $article->title }}</h4>
            <p class="px-3 space_preserve"> {{ $article->paragraph }} </p>
            <p class="px-3">Article posted by <b>{{ $article->user() }}</b></p>
        </div>
    </div>

@endsection
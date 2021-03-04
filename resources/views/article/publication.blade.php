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

    <div>
        <h2 class="text-center text-primary">My Publicaions</h2>
        @forelse ($myPublications as $myPublication)
            
            <div class="article_width p-2">

                <h4 class="text-left ml-4 text-secondary">
                    {{ $myPublication->title }}

                    <form method="post" action="/home/delete/{{ $myPublication->id }}">
                        @csrf
                        <button type="submit" class="float-right btn btn-primary mx-1">Delete</button>
                    </form>

                    <a href="/home/edit/{{ $myPublication->id }}"><button class="float-right btn btn-primary mx-1">Edit</button></a>
                </h4>
            </div>
        @empty
            <p>You have not published any article yet.</p>

        @endforelse
    </div>

    <br>
    
    

@endsection
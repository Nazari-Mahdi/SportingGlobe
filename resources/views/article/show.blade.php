@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <img src="{{ asset('Storage/'.$article['image']) }}" height="300px" width="400px" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $article['title'] }}</h5>
                <p class="card-text">{{ $article['description'] }}</p>
                <button type="button" class="btn btn-outline-info " style="margin-left: 8px;"><a href="{{ route('article.edit' , $article) }}" class="text-decoration-none">Edit</a></button>
            </div>
        </div>
    </div>

@endsection

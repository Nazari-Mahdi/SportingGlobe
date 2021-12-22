@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}

                <h2 class="mt-5">Your Articles</h2>
            <div class="shadow p-3 mb-5 bg-white rounded mt-5">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($articles)
                        @foreach($articles as $article)
                            <tr>
                                <th scope="row">{{ $article['id'] }}</th>
                                <td>{{ isset($article->user['name']) ? $article->user['name'] : "Public" }}</td>
                                <td>{{ $article['title'] }}</td>
                                <td>
                                    <a href="{{ route('article.show' , $article) }}">
                                        <img src="{{ asset('Storage/'.$article['image']) }}" alt="" width="100" height="50">
                                    </a>
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($article['description'], 50, $end='...')}}</td>
                                <td>
                                    <div class="d-flex">

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Delete
                                        </button>
                                        <button type="button" class="btn btn-outline-info " style="margin-left: 8px;"><a href="{{ route('article.edit' , $article) }}" class="text-decoration-none">Edit</a></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
                {{--                            <div class="d-flex">--}}
                {{--                                @isset($articles)--}}
                {{--                                    {!! $articles->links() !!}--}}
                {{--                                @endisset--}}
                {{--                            </div>--}}
            </div>
        </div>
    </div>
</div>
@endsection

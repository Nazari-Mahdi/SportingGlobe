@extends('layouts.app')

@section('content')

<div class="container">

    <h1>{{ isset($article)? 'Edit Article' : 'Create Article' }}</h1>
    <form action="{{ isset($article)? route('article.update' , $article) : route('article.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        @if(isset($article)) @method('PUT') @else @method('POST') @endif

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Article Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{ isset($article)? $article['title'] : '' }}">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Article Picture</label>
            <input name="image" class="form-control" type="file"  id="formFile">
        </div>
        @isset($article)
            <img src="{{ asset('Storage/'.$article['image']) }}" alt="" width="200" height="150" class="my-5">
        @endisset
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Article Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">
                {{ isset($article)? $article['title'] : '' }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($article)? "Update" : "Create" }}</button>
    </form>

</div>

@endsection

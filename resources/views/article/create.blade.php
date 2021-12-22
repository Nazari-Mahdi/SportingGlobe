@extends('layouts.app')

@section('content')

<div class="container">

    <div class="shadow p-3 mb-5 bg-white rounded w-75 mx-auto p-5 mt-5">
        <h1 class="text-center">{{ isset($article)? 'Edit Article' : 'Create Article' }}</h1>

        <form action="{{ isset($article)? route('article.update' , $article) : route('article.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            @if(isset($article)) @method('PUT') @else @method('POST') @endif
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Article Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp" value="{{ isset($article)? $article['title'] : '' }}" >

                @error('title')
                <div class="col-sm-3">
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Article Picture</label>
                <input name="image"  class="form-control" type="file"  id="formFile" >
                @error('image')
                <div class="col-sm-3">
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                </div>
                @enderror
            </div>
            @isset($article)
                <img src="{{ asset('Storage/'.$article['image']) }}" alt="" width="200" height="150" class="my-5">
            @endisset
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Article Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">
                {{ isset($article)? $article['description'] : '' }}
            </textarea>
                @error('description')
                <div class="col-sm-3">
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-primary">{{ isset($article)? "Update Article" : "Create Article" }}</button>
        </form>
    </div>

</div>

@endsection

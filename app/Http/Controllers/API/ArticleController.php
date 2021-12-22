<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function index(){

        $articles = Article::all();

        return response()->json([
            'articles' => $articles
        ],200);
    }

    public function show($article){

        $article = Article::findOrFail($article);

        return response()->json([
            'article_title' => $article['title'],
            'article_image' => $article['image'],
            'article_description' => $article['description'],
        ],200);
    }

    public function store(Request $request){

        $inputs = request()->validate([
            'title' => 'required|max:255',
            'image' => 'file',
            'description' => 'required'
        ]);

        $inputs['image'] = $request['image']->store('images');

        if (Auth::check()) {
            $inputs['user_id'] = Auth::id();
        }

        Article::create($inputs);

        return response()->json([
            'article_title' => $inputs['title'],
            'article_image' => $inputs['image'],
            'article_description' => $inputs['description'],
        ], 200);
    }


    public function update($article, Request $request){

        $inputs = $request->validate([
            'title' => 'required',
            'image' => 'file',
            'description' => 'required'
        ]);

        if ($request->has('image')){
            $inputs['image'] = $request['image']->store('images');
            $article['image'] = $inputs['image'];
        }
        $article->update($inputs);

        return response()->json([
            'article_title' => $article['title'],
            'article_image' => $article['image'],
            'article_description' => $article['description'],
        ], 200);
    }

    public function destroy(Article $article)
    {

        $article->delete();

        return response()->json('deleted', 200);
    }


}

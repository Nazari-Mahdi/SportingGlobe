<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class ArticleController extends Controller
{


    public function index(){

        $articles = Article::paginate(5);

        return view('welcome', compact('articles'));

    }


    public function create(){

        return view('article.create');
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

        Session::flash('success' , 'Article has been created successfully');

        return redirect('/');

    }


    public function show(Article $article){

        return view('article.show',compact('article'));

    }


    public function edit(Article $article){

        return view('article.create', compact('article'));

    }


    public function update(Article $article , Request $request){

        $inputs = $request->validate([
            'title' => 'required',
            'image' => 'mimes:svg,jpeg,jpg,png,gif',
            'description' => 'required'
        ]);

        if ($request->has('image')){
            $inputs['image'] = $request['image']->store('images');
            $article['image'] = $inputs['image'];
        }

        $article->update($inputs);

        Session::flash('success' , 'Article has been update successfully');

        return redirect('/');

    }


    public function destroy(Article $article){

        $article->delete();

        Session::flash('success' , 'Article has been deleted successfully');

        return back();
    }
}

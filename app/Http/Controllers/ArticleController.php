<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{


    public function index(){

        $articles = Article::all();

        return view('welcome', compact('articles'));

//        <!-- JSON -->

//        return response()->json([
//            "Articles" => $articles
//        ]);
    }


    public function create(){

        return view('article.create');
    }


    public function store(Request $request, Article $article){



        $inputs = request()->validate([
            'title' => 'required|max:255',
            'image'=> 'file',
            'description' => 'required'
        ]);


        $inputs['image'] = $request['image']->store('images');


        $article->create($inputs);
        Session::flash('success' , 'Article has been created successfully');

        return redirect('/');


        //        <!-- JSON -->

//        return response()->json([
//            'title' => $article['title'],
//            'image' => $article['image'],
//            'description' => $article['description']
//        ]);

    }


    public function show(Article $article){

        return view('article.show',compact('article'));

        //        <!-- JSON -->

        //        return response()->json([
//            'title' => $article['title'],
//            'image' => $article['image'],
//            'description' => $article['description']
//        ]);
    }


    public function edit(Article $article){

        return view('article.create', compact('article'));

        //        <!-- JSON -->

        //        return response()->json([
//            'title' => $article['title'],
//            'image' => $article['image'],
//            'description' => $article['description']
//        ]);
    }


    public function update(Article $article , Request $request){

        $inputs = $request->validate([
            'title' => 'required',
            'image' => 'file',
            'description' => 'required'
        ]);

        if ($request->has('image')){
            $inputs['image'] = $request['post_image']->store('images');
            $article['image'] = $inputs['post_image'];
        }

        $article->update($inputs);

        Session::flash('success' , 'Article has been update successfully');

        return redirect('/');

//        <!-- JSON -->

        //        return response()->json([
//            'title' => $article['title'],
//            'image' => $article['image'],
//            'description' => $article['description']
//        ]);


    }


    public function destroy(Article $article){

        $article->delete();

        Session::flash('success' , 'Article has been deleted successfully');

        return back();
    }
}

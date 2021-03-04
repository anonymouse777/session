<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requesst;
use DB;
use App\CreateUserTable;
use App\Article;

class ArticleController extends Controller
{

    public function __construct()
    {
        // Below middle whare is a route middlewhare defined in middleware directory
        $this->middleware('ufc');

        // These below lines are performing a middleware for this class. The below lines check if the user is login or not. If not it send the request to given route to login page.
        // $this->middleware(function ($request, $next) {
        //     if (session()->get('key') === NULL ){
        //         //dd('not login');
        //        return redirect('/login');
        //     }
        //     return $next($request);
        // });
    }

    public function create()
    {
        return view('article.create', ['username' => session()->get('key') ]);
    }
    
    public function store()
    {
		$user = CreateUserTable::where('username',session('key'))->first();
		$article = new Article();
		$article->title = request('title');
		$article->paragraph = request('paragraph');
		$article->user_id = $user->id;
		$article->save();
		$articles = Article::all();
		return redirect('/home');
    }


    public function myPublication(){
        $user_id = CreateUserTable::where('username', session('key'))->first();
        $myPublication = Article::where('user_id', $user_id->id)->get();
        return view('article.publication', ['username'=> session('key'), 'myPublications'=>$myPublication]);
    }

    public function editArticle($id) {
        $article = Article::find($id);
        $user_name = $article->user();
        return view('article.edit_article', ['username'=> session('key'), 'article'=> $article]);
    }

    public function saveEditArticle($id){
        
        $article = Article::find($id);
        $article->title = request('title');
        $article->paragraph = request('paragraph');
        $article->save();
        return redirect('/home/publication');
    }

    public function deletePublication($id){
        $article = Article::find($id);
        $user_name = $article->user();
        return redirect('/home/publication');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\CreateUserTable;
use App\Article;
use App\Comment;

class UserController extends Controller
{
    public function __construct (){
        // The follwoing functions [home, logout, comment, article] are performend while the user is login. I created a Route Middleware that check if the given user is in session or not. This contructon check the session condition for the above mention functions.

        $this->middleware('ufc')->only('home');
        $this->middleware('ufc')->only('logout');
        $this->middleware('ufc')->only('comment');
        $this->middleware('ufc')->only('article');
    }


    public function welcome()
    //
    {
        return view('guest.welcome', ['articles'=> Article::all() ]);
    }
    public function index()
    {
    	return view('login.login');
    }

    public function create()
    {
    	return view('login.register');
    }

    public function store()
    {
    	request()->validate([
    		'username' => 'required',
    		'email' => 'required|email',
    		'password' => 'required',
            'user_image' => 'required|file',
    	]);
    	$new = new CreateUserTable();
    	$new->username = request('username');
    	$new->email = request('email');
    	$new->password = request('password');
        $imageName = request('username'). '.' .request('user_image')->getClientOriginalExtension();
        request('user_image')->move(public_path('user_image'), $imageName);
        $new->user_image = $imageName;
    	$new->save();
    	session(['key' => $new->username, 'image'=>$imageName]);
        return redirect('/home');
    }

    public function login()
    {
    	request()->validate([
    		'email' => 'required|email',
    		'password' => 'required'
    	]);
        $user = NULL;
    	$user = CreateUserTable::where('email',request('email'))->first();
        if ($user != NULL)
        {
            if ($user->password === request('password')){
                session(['key' => $user->username, 'image'=> $user->user_image]);
                return redirect('/home');
            }
        }

    	else{
    		return redirect('/login')->with('message', 'Invalid User Name or Password.');
    	}
    }

    public function home()
    {
        return view('home.home', ['username' => session()->get('key'), 'image' => session()->get('image'), 'articles' => Article::all() ]);
    }

    public function logout()
    {
        session()->forget('key');
        return redirect('/login');
    }
    
    public function article($title)
    {
        $article = Article::where('title',$title)->first();
        $comments = Comment::where('article_id', $article->id)->get();
        return view('home.article',['username'=> session('key'), 'article'=> $article, 'comments'=> $comments ]);
    }

    public function comment($title)
    {
        $article = Article::where('title',$title)->first();
        $comment = new Comment();
        $comment->comment = request('comment');
        $user = CreateUserTable::where('username',session('key'))->first();
        $comment->user_id = $user->id;
        $comment->article_id = $article->id;
        $comment->save();
        return redirect('/home');
    }

    public function showArticle($title)
    {
        $article = Article::where('title', $title)->first();
        return view('guest.singleArticle', ['article'=>$article]);
    }
}

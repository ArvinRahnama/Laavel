<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\testmail;
use http\Cookie;
use App\Models\Article;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function Home()
    {
//        Mail::to('arvin.rnm@gmail.com')->send(new testmail('Arvin', 2001));
//        session(['key'=>'value']);
//        cookie()->queue(Cookie('name',"hasan",1));
        $articles = Article::all();
        return view('index', compact('articles'));
    }

    public function about()
    {
//        dd(session()->all());
//        dd(request()->cookie('name'));
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function services()
    {
        return view('services');
    }
}

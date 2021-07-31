<?php

namespace App\Http\Controllers;

use App\Mail\testmail;
use Illuminate\Http\Request;
use App\Models\Articles;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function Home()
    {
//        Mail::to('arvin.rnm@gmail.com')->send(new testmail('Arvin', 2001));
        session(['key'=>'value']);
        $articles = Articles::all();
        return view('index', compact('articles'));
    }

    public function about()
    {
        dd(session()->all());
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}

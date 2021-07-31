<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;

class HomeController extends Controller
{
    public function Home()
    {
        $articles = Articles::all();
        return view('index', compact('articles'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}

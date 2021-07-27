<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Articles;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin.articles.index', ['articles' => Articles::all()]);
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $validate_data = $request->validated();

        Articles::create([
            'title' => $validate_data['title'],
            'slug' => $validate_data['title'],
            'body' => $validate_data['body'],
        ]);

        return redirect('/admin/articles/create');
    }

    public function edit(Articles $articles)
    {
        return view('admin.articles.edit', [
            'article' => $articles
        ]);
    }

    public function update(ArticleRequest $request,Articles $articles)
    {
        $validate_data = $request->validated();

        $articles->update($validate_data);

        return back();
    }

    public function delete(Articles $articles)
    {
        $articles->delete();
        return back();
    }
}


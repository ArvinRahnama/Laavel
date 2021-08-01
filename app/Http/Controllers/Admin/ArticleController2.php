<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;

class ArticleController2 extends Controller
{
    public function index()
    {
        return view('admin.articles.index', ['articles' => Article::all()]);
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $validate_data = $request->validated();

        Article::create([
            'title' => $validate_data['title'],
            'slug' => $validate_data['title'],
            'body' => $validate_data['body'],
        ]);

        return redirect('/admin/articles/create');
    }

    public function edit(Article $articles)
    {
        return view('admin.articles.edit', [
            'article' => $articles
        ]);
    }

    public function update(ArticleRequest $request, Article $articles)
    {
        $validate_data = $request->validated();

        $articles->update($validate_data);

        return back();
    }

    public function delete(Article $articles)
    {
        $articles->delete();
        return back();
    }
}


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

    public function edit($id)
    {
        $article = Articles::findOrFail($id);

        return view('admin.articles.edit', [
            'article' => $article
        ]);
    }

    public function update($id)
    {
        $validate_data = $this->validate(request(), [
            'title' => 'required|min:10|max:50',
            'body' => 'required'
        ]);

        $article = Articles::findOrFail($id);

        $article->update($validate_data);

        return back();
    }

    public function delete($id)
    {
        $article = Articles::findOrFail($id);
        $article->delete();
        return back();
    }
}


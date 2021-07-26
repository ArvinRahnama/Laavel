<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function store()
    {
        $validate_data = Validator::make(request()->all(), [
            'title' => 'required|min:7|max:50',
            'body' => 'required'
        ])->validated();


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
        $validate_data = Validator::make(request()->all(), [
            'title' => 'required|min:10|max:50',
            'body' => 'required'
        ])->validated();

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


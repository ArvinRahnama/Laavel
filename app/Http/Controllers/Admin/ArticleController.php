<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('single');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index', ['articles' => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request,Article $article)
    {
        $validate_data = $request->validated();
//        $request->validate(['image' => 'mimes:jpeg,bmp,png']);
//        dd($validate_data['image']);

//        Article::create([
//            'user_id' => auth()->user()->id,
//            'title' => $validate_data['title'],
////            'slug' => $validate_data['title'],
//            'body' => $validate_data['body']
//        ]);

//        or
//        if (isset($request->image)) {
//            $destinationPath = '/images';
//            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
//            $image->move($destinationPath, $profileImage);}
        if ($request->hasFile('file')) {

            $validate_data['file']->store('Article/Images', 'public');
//            $article = auth()->user()->articles()->create([
//
//            ]);

            $article = new Article([
                'user_id' => auth()->user()->id,
                "file_path" =>  $validate_data['file']->hashName(),
                'title' => $validate_data['title'],
                'body' => $validate_data['body']
            ]);
            $article->save();
        }

        $article->categories()->attach($request->input('categories'));

        return redirect('/admin/articles');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Article  $article
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Article $article)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $validate_data = $request->validated();
        if ($request->hasFile('file')){
            unlink('storage/Article/Images/'.$article->file_path);
            $request->file->store('Article/Images', 'public');
        }
        $article->update([
            'user_id' => auth()->user()->id,
            "file_path" =>  $validate_data['file']->hashName(),
            'title' => $validate_data['title'],
            'body' => $validate_data['body']
        ]);
        $article->categories()->sync($request->input('categories'));

        return redirect('/admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        @unlink('storage/Article/Images/'.$article->file_path);
        $article->delete();
        return back();
    }

    public function single($article)
    {
        return view('single', compact('article'));
    }
}

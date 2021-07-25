<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Articles;
use Illuminate\Support\Facades\Validator;

Route::get('/', function () {
    dd(Articles::All());
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::prefix('admin')->group(function() {
    Route::get('/articles/create' , function() {

        return view('admin.articles.create');
    });
    Route::post('/articles/create',function() {

        $validate_data = Validator::make(request()->all() , [
            'title' => 'required|min:10|max:50',
            'body' => 'required'
        ])->validated();


        Articles::create([
            'title' => $validate_data['title'],
            'slug' => $validate_data['title'],
            'body' => $validate_data['body'],
        ]);

        return redirect('/admin/articles/create');
    });
    Route::get('/articles/{id}/edit' , function($id) {
       $article = Articles::findOrFail($id);

       return view('admin.articles.edit' , [
           'article' => $article
       ]);
    });
    Route::put('/articles/{id}/edit' , function($id) {
        $validate_data = Validator::make(request()->all() , [
            'title' => 'required|min:10|max:50',
            'body' => 'required'
        ])->validated();

        $article = Articles::findOrFail($id);

        $article->update($validate_data);

        return back();
    });
});


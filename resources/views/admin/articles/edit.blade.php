@extends('layouts.master')


@section('content')
    <h2>edit Article</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/articles/{{ $article->id }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">title :</label>
            <input type="text" name="title" class="form-control" value="{{$article->title}}">
        </div>
        <div class="form-group">
            <label for="">Category:</label>
            <select name="categories[]" class="form-control" multiple>
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{in_array($category->id,$article->categories()->pluck('id')->toArray()) ? 'selected' : ''}} >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="body">body :</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$article->body}}</textarea>
        </div>
        <button class="btn btn-info">update</button>
    </form>
@endsection

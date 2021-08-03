@extends('layouts.master')


@section('content')
    <h2>Create Article</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('articles.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">title :</label>
            <input type="text" name="title" class="form-control">
            <div class="form-group">
                <label for="">Category:</label>
                <select name="categories[]" class="form-control" multiple>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="body">body :</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <br>
            <button class="btn btn-danger">send</button>
    </form>
@endsection

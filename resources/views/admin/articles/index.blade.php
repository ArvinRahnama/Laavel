@extends('layouts.master')


@section('content')
    <h2>All Article</h2>
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>operation  <a href="{{route('articles.create')}}" class="btn btn-success">Create</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>
                    <form action="/admin/articles/{{$article->id}}" method="post">
                        @CSRF
                        @method('delete')
                        <button class="btn btn-danger">delete</button>
                        <a href="/admin/articles/{{$article->id}}/edit" class="btn btn-info">Update</a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

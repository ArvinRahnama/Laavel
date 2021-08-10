 @extends('layouts.master')


@section('content')


@foreach($articles as $article)
    <!-- Blog Post -->
    <div class="card mb-4">
        <img class="card-img-top" src="{{route('home')}}/storage/Article/Images/{{$article->file_path}}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$article->title}}</h2>
            <p class="card-text">{{$article->summary}}</p>
            <a href="/articles/{{$article->slug}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted on {{$article->created_at}}
        </div>
    </div>
@endforeach
    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>
@endsection


@section('sidebar')
    @parent

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Bar Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>
@endsection

 @extends('layouts.master')


@section('content')
    <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
    </h1>

@foreach($articles as $article)
    <!-- Blog Post -->
    <div class="card mb-4">
        <img class="card-img-top" src="/images/cms-laravel-cover-1.jpg" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$article->title}}</h2>
            <p class="card-text">{{$article->body}}</p>
            <a href="/articles/{{$article->slug}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="#">Start Bootstrap</a>
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

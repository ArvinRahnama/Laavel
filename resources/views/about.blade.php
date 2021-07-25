@extends('layouts.master')


@section('content')
    <h2>About Page</h2>
    <!-- /.row -->
@endsection

@section('sidebar')
    @parent

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">About Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>
@endsection

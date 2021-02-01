@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>YOUR POSTS</h1>
        @if ($posts->isEmpty())
            <p>No post has been created yet.</p>
        @else
            there are posts
        @endif
    </div>
@endsection
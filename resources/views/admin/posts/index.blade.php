@extends('layouts.app')

@section('content')
    @if (session('post-deleted'))
        <div class="alert alert-success">
            Product '{{ session('post-deleted') }}' has been deleted successfully.
        </div>
    @endif
    <div class="container">
        <h1>YOUR POSTS</h1>
        @if ($posts->isEmpty())
            <p>No post has been created yet.</p>
        @else
            {{-- POST TABLE --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>Created</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at->format('d/m/Y') }}</td>

                            <td>
                                <a href="{{ route('admin.posts.show' , $post->slug) }}" class="btn btn-success">Show</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.posts.edit' , $post->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                 <form action="{{ route('admin.posts.destroy' , $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete Post">
                                </form>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
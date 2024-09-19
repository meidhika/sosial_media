@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Form untuk mencari berdasarkan tag atau hashtag -->
        <form action="{{ route('search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search tag or hashtag"
                    aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <!-- Menampilkan hasil pencarian posts -->
        <h3>Posts</h3>
        @if ($posts->isEmpty())
            <p>No posts found with the given tag.</p>
        @else
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->postingan }}</h5>
                        @if ($post->gambar)
                            <img src="{{ asset('storage/image/' . $post->gambar) }}" alt="Post Image" width="100px"
                                class="img-fluid">
                        @endif
                        <p class="card-text">{{ $post->tag }}</p>
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Menampilkan hasil pencarian comments -->
        <h3>Comments</h3>
        @if ($comments->isEmpty())
            <p>No comments found with the given hashtag.</p>
        @else
            @foreach ($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong>{{ $comment->user->nama }}:</strong> {{ $comment->komentar }}</p>
                        @if ($comment->image)
                            <img src="{{ asset('storage/image/' . $comment->image) }}" alt="Comment Image" width="100px"
                                class="img-fluid">
                        @endif
                        <p class="text-muted">{{ $comment->hashtag }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

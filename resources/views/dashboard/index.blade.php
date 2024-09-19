@extends('layouts.app')
@section('content')
    <div class="row">
        <form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row align-items-center">
                <input type="hidden" name="id_user">
                <div class="col-sm-10">

                    <textarea name="postingan" id="" cols="30" rows="2" placeholder="Apa Yang Sedang Anda Fikirkan?"
                        class="form-control rounded-pill"></textarea>

                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Create Post</button>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="" class="form-label">Upload Gambar</label>
                    <input type="file" name="gambar">
                </div>
                <div class="col-sm-6">
                    <label for="" class="form-label">Masukkan Hastag</label>
                    <input type="text" class="form-control" name="tag">
                </div>
            </div>
        </form>
    </div>
    <hr>
    <div class="row my-5 ">
        <div class="col-sm-6 ">
            @foreach ($posts as $post)
                <div class="mb-3 border p-2 rounded">
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <img src="{{ asset('storage/image/' . $post->user->foto_profile) }}" alt=""
                                width="50px" class="rounded">
                            <small>{{ $post->user->nama }}</small>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('storage/image/' . $post->gambar) }}" alt="" width="100px"
                                class="rounded">
                            <p class="m-0">{{ $post->postingan }}</p>
                            <small class="m-0">{{ $post->tag }}</small>
                            <p class="text-muted">{{ $post->time_ago }}</p>
                        </div>
                        @if (Auth::id() === $post->user->id)
                            <div class="col-sm-4">
                                <a href="{{ route('dashboard.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('post.softdelete', $post->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <a href="{{ route('komentar.show', $post->id) }}">Lihat Komentar</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

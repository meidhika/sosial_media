@extends('layouts.app')
@section('content')
    <div class="row my-3 ">
        <div class="col-sm-8 ">
            <div class="mb-3 border p-2 rounded">
                <div class="row align-items-center">
                    <div class="col-sm-2">
                        <img src="{{ asset('storage/image/' . $post->user->foto_profile) }}" alt="" width="50px"
                            class="rounded">
                        <small>{{ $post->user->nama }}</small>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{ asset('storage/image/' . $post->gambar) }}" alt="" width="100px"
                            class="rounded">
                        <p class="m-0">{{ $post->postingan }}</p>
                        <small class="m-0">{{ $post->tag }}</small>
                        <p class="text-muted">{{ $post->time_ago }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <strong>Komentar</strong>
    @foreach ($comments as $comment)
        <div class="row">
            <div class="col-sm-5">
                <div class="mb-2">
                    <p class="m-0">{{ $comment->user->nama }}</p>
                    <small class="m-0">{{ $comment->komentar }}</small>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="{{ route('komentar.edit', $comment->id) }}" class="btn btn-sm btn-primary mt-3">Edit</a>
                <form action="{{ route('komentar.softdelete', $comment->id) }}" method="POST" style="display: inline; "
                    onsubmit="return confirm('Akan di delete sementara ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    <hr>
    <form action="{{ route('komentar.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row my-2 ">
            <div class="col-sm-6">
                <div class="row align-items-center">
                    <div class="col-sm-9">
                        <input type="hidden" name="id_posts" value="{{ $post->id }}">
                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                        <textarea name="komentar" id="" cols="30" rows="2" placeholder="Masukkan Komentar Anda"
                            class="form-control rounded-pill"></textarea>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary mb-2">Comment</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <p>Opsional</p>
            <div class="col-sm-3">
                <label for="" class="form-label">Upload Gambar</label>
                <input type="file" name="image">
            </div>
            <div class="col-sm-4">
                <label for="" class="form-label">Masukkan Hastag</label>
                <input type="text" class="form-control" name="hashtag" placeholder="#hashtag">
            </div>
        </div>
    </form>

    <div class="my-3">
        <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection

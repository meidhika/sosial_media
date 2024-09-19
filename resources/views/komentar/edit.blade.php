@extends('layouts.app')
@section('content')
    <form action="{{ route('komentar.update', $edit->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row my-2 ">
            <div class="col-sm-6">
                <div class="row align-items-center">
                    <div class="col-sm-9">
                        <input type="hidden" name="id_posts" value="{{ $edit->id_posts }}">
                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                        <textarea name="komentar" id="" cols="30" rows="2" placeholder="Masukkan Komentar Anda"
                            class="form-control rounded-pill">{{ $edit->komentar }}</textarea>
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
                <input type="file" name="image" value="{{ $edit->image }}">
            </div>
            <div class="col-sm-4">
                <label for="" class="form-label">Masukkan Hastag</label>
                <input type="text" class="form-control" name="hashtag" placeholder="#hashtag"
                    value="{{ $edit->hashtag }}">
            </div>
        </div>
    </form>
@endsection

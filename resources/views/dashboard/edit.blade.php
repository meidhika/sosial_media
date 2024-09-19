@extends('layouts.app')
@section('title', 'Edit Postingan')
@section('content')
    <form action="{{ route('dashboard.update', $edit->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-sm-6">
                <textarea name="postingan" id="" cols="30" rows="2" class="form-control rounded">{{ $edit->postingan }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-5">

                        <input type="file" name="gambar" value="{{ $edit->gambar }}">
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="tag" value="{{ $edit->tag }}">

                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
@endsection

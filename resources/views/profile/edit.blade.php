@extends('layouts.app')
@section('content')
    <form action="{{ route('profile.update', $edit->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-6">

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>

                    <input value="{{ $edit->nama }}" required id="name" class="form-control" name="nama"
                        type="text" placeholder="Nama Anda">

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>

                    <input value="{{ $edit->email }}" required id="email" class="form-control" name="email"
                        type="text" placeholder="Nama Anda">

                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>

                    <input value="{{ $edit->bio }}" required id="bio" class="form-control" name="bio"
                        type="text" placeholder="Nama Anda">

                </div>
                <div class="mb-3">
                    <label for="foto_profil" class="form-label">Photo Profile Anda</label>
                    <input value="{{ $edit->foto_prfile }}" id="foto_profil" class="form-control" name="foto_profile"
                        type="file">
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-12">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="{{ route('profile.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
@endsection

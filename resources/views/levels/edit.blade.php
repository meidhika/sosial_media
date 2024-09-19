@extends('layouts.app')
@section('content')
    <form action="{{ route('levels.update', $edit->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <label for="nama_level" class="form-label">Nama Level *</label>

            <div class="col-sm-6">
                <input value="{{ $edit->nama_level }}" required id="nama_level" class="form-control" name="nama_level"
                    type="text" placeholder="Nama Level">
            </div>
        </div>
        <div class="mb-3 row">

            <div class="col-sm-12">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="{{ route('levels.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
@endsection

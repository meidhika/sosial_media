@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="col-sm-4 text-center">
            <img src="{{ asset('storage/image/' . $user->foto_profile) }}" alt="" width="50%" class="rounded">
        </div>
        <div class="col-sm-8">
            <div class="mb-3">
                <h3>Nama</h3>
                <p>{{ $user->nama }}</p>
            </div>
            <div class="mb-3">
                <h3>Email</h3>
                <p>{{ $user->email }}</p>
            </div>
            <div class="mb-3">
                <h3>Bio</h3>
                <p>{{ $user->bio }}</p>
            </div>
        </div>
    </div>
    <div align="right" class="mb-3">
        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Update Profile</a>
    </div>
@endsection

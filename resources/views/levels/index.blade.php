@extends('layouts.app')
@section('content')
    <div class="table-responsive rounded">
        <div align="left" class="mb-3">
            <a href="{{ route('levels.create') }}" class="btn btn-primary">Create Level</a>
        </div>
        <table id="myTable" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as $level => $item)
                    <tr>
                        <td>{{ $level + 1 }}</td>
                        <td>{{ $item->nama_level }}</td>
                        <td><a href="{{ route('levels.edit', $item->id) }}" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('levels.softdelete', $item->id) }}" method="POST" style="display: inline"
                                onsubmit="return confirm('Akan di delete sementara ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

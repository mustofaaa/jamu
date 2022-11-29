@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body ">
                    <a href="{{ route('post.create') }}" class="btn btn-primary mb-2">Add New Article</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>judul</th>
                                <th>Image</th>
                                <th>isi</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Tanggal Dibuat</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->judul }}</td>
                                <td><img src="{{ asset('storage/'.$d->image) }}" style="height: 100px; width: 150px;">
                                </td>
                                <td>{{ Str::limit($d->isi, 100) }}</td>
                                <td>{{ $d->kategori->nama }}</td>
                                <td>{{ $d->penulis }}</td>
                                <td>{{ $d->tgl }}</td>
                                <td>{{ $d->status }}</td>
                                <td>
                                    <a href="{{ route('post.edit', $d->id ) }}"
                                        class="btn btn-sm btn-primary mb-1">Edit</a>
                                    <form action="{{ route('post.destroy', $d->id ) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                    </form>
                                </td>

                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

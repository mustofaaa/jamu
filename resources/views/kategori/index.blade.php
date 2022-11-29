@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-2">Tambah</a>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi Kategori</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->desc }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $d->id ) }}" class="btn btn-sm btn-primary mb-1">Edit</a>
                                <form action="{{ route('kategori.destroy', $d->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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

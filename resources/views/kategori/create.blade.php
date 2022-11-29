@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Nama Kategori</label>
                          <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kategori" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Deskripsi Kategori</label>
                          <textarea type="text" class="form-control" name="desc" placeholder="Masukkan Deskripsi Kategori" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

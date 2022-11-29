@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="judul" placeholder="Insert Article Title"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" placeholder="Choose Image File" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <input type="text" class="form-control" name="isi" placeholder="Insert Article Content"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" aria-label="Default select example" name="kategori_id">
                                <option selected disabled>Category Select Menu</option>
                                @foreach ($data as $kt)
                                <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Author</label>
                            <input type="text" class="form-control" name="penulis" placeholder="Article Author" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="tgl" placeholder="Article Date Created"
                                required>
                        </div>
                        @if (Auth::user()->role == 'admin')
                        <div class="mb-3">
                            <label class="form-label">Status Post</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option>Aktif</option>
                                <option>Tidak Aktif</option>
                            </select>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

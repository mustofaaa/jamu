                    @extends('layouts.app')
                    @section('content')
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Dashboard') }}</div>

                                    <div class="card-body">
                                        <form action="{{ route('post.update', $post->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="judul"
                                                    placeholder="Insert post Title" required value="{{ $post->judul }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Image</label>
                                                <img src="{{ asset('storage/'.$post->image) }}" alt="" width="100px" class="mb-3">
                                                <input type="file" class="form-control" name="image"
                                                    placeholder="Choose Image File">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Content</label>
                                                <input type="text" class="form-control" name="isi"
                                                    placeholder="Insert post Content" required value="{{ $post->isi }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="kategori_id">
                                                    <option selected>Open this select menu</option>
                                                    @foreach ($data as $kt)
                                                    <option value="{{ $kt->id }}" @selected($post->
                                                        kategori_id==$kt->id)>{{ $kt->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Author</label>
                                                <input type="text" class="form-control" name="penulis"
                                                    placeholder="post Author" required value="{{ $post->penulis }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Date</label>
                                                <input type="date" class="form-control" name="tgl"
                                                    placeholder="post Date Created" required value="{{ $post->tgl }}">
                                            </div>
                                            @if(Auth::user()->role == 'admin')
                                            <div class="mb-3">
                                                <label class="form-label">Select</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="status">
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

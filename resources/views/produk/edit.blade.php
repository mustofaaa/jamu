                    @extends('layouts.app')
                    @section('content')
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Dashboard') }}</div>

                                    <div class="card-body">
                                        <form action="{{ route('produk.update', $produk->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="nama"
                                                    placeholder="Insert post Title" required value="{{ $produk->nama }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Image</label>
                                                <img src="{{ asset('storage/'.$produk->image) }}" alt="" width="100px" class="mb-3">
                                                <input type="file" class="form-control" name="image"
                                                    placeholder="Choose Image File">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Harga</label>
                                                <input type="text" class="form-control" name="harga"
                                                    placeholder="Insert post Content" required value="{{ $produk->harga }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">desc</label>
                                                <input type="text" class="form-control" name="desc"
                                                    placeholder="Insert post Content" required value="{{ $produk->desc }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kategori</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="kategori_id">
                                                    <option selected>Open this select menu</option>
                                                    @foreach ($data as $kt)
                                                    <option value="{{ $kt->id }}" @selected($kt->kategori_id==$kt->id)>{{ $kt->nama }}</option>
                                                    @endforeach
                                                </select>
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

<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengembalikan view ke halaman index dengan membawa data kategori
        $data = Produk::all();
        return view('produk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengembalikan view ke halaman create
        $data = Kategori::all();
        return view('produk.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambahkan data dalam dorm ke dalam database
        // dd($request);
        $data = $request->all();
        $data['image'] = Storage::put('produk/image',  $request->file('image'));
        Produk::create($data);
        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //mengembalikan view ke halaman edit
        $data = Kategori::all();
        return view('produk.edit', compact('produk', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        // mengubah data didalam database dengan data dalam form
        $data = $request->all();

        try {
            $data['image'] = Storage::put('produk/image',  $request->image);
            $produk->update($data);
        } catch (\Throwable $th) {
            $data['image'] = $produk->image;
            $produk->update($data);
        }
        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        // menghapus data di database berdasarkan id yang dipilih di tabel
        $produk->delete();
        return redirect('produk');
    }
}

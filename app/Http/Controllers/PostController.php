<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengembalikan view ke halaman index dengan membawa data kategori
        $data = Post::all();
        return view('post.index', compact('data'));
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
        return view('post.create', compact('data'));
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
        $data['image'] = Storage::put('post/image',  $request->file('image'));
        Post::create($data);
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //mengembalikan view ke halaman edit
        $data = Kategori::all();
        return view('post.edit', compact('data', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // mengubah data didalam database dengan data dalam form
        $data = $request->all();

        try {
            $data['image'] = Storage::put('post/image',  $request->image);
            $post->update($data);
        } catch (\Throwable $th) {
            $data['image'] = $post->image;
            $post->update($data);
        }
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // menghapus data di database berdasarkan id yang dipilih di tabel
        $post->delete();
        return redirect('post');
    }
    public function blog()
    {
        $data = Post::where('status', 'aktif')->get();
        return view('blog', compact('data'));
    }
}

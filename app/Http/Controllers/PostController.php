<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Tampilkan daftar post, diurutkan dari yang paling baru dibuat.
     */
    public function index()
    {
        $posts = Post::latest()->get();

        // Inertia mengirim data ini sebagai props ke halaman Vue Post/Index.
        return Inertia::render('Post/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * Tampilkan formulir untuk membuat post baru.
     */
    public function create()
    {
        return Inertia::render('Post/Create');
    }

    /**
     * Validasi input, simpan post, lalu kembali ke daftar dengan pesan sukses.
     */
    public function store(Request $request)
    {
        // Tolak data kosong sebelum menjalankan mass assignment ke model.
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        $post = Post::create([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        if($post) {
            return Redirect::route('posts.index')->with('message', 'Data Berhasil Disimpan!');
        }
    }

    /**
     * Kirim post yang ditemukan melalui route model binding ke formulir edit.
     */
    public function edit(Post $post)
    {
        return Inertia::render('Post/Edit', [
            'post' => $post
        ]);
    }

    /**
     * Validasi perubahan lalu perbarui post yang dipilih.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        if($post) {
            return Redirect::route('posts.index')->with('message', 'Data Berhasil Diupdate!');
        }
    }

    /**
     * Hapus post berdasarkan ID; findOrFail menghasilkan 404 jika tidak ditemukan.
     */
    public function destroy($id)
    {
        $post = Post::findOrfail($id);

        $post->delete();

        if($post) {
            return Redirect::route('posts.index')->with('message', 'Data Berhasil Dihapus!');
        }

    }
}
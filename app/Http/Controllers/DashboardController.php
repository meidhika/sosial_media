<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan Postingan yang telah dibuat oleh user
        $posts = Post::with('user')->latest()->get();
        return view('dashboard.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Rangkaian Fungsi untuk membuat postingan
        $user = auth()->user(); //mengambil data user
        $post = new Post(); //membuat post baru
        $post->id_user = Auth::user()->id; //ambil user berdasarkan id
        $post->postingan = $request->input('postingan'); //meminta reqest dari form dengan name postingan
        $post->tag = $request->input('tag'); //meminta request dari form dengan name tag
        if ($request->hasFile('gambar')) { //meminta request dari form dengan name gambar lalu menyimpannya di storage
            $image = $request->file('gambar');
            $path = $image->store('image', 'public');
            $name = basename($path);
            $post->gambar = $name;
        }
        $post->save(); //menyimpan seluruh data yang telah di request

        Alert::success('Post Created', 'Post Berhasil Di Edit');
        return redirect()->to('dashboard')->with('message', 'Data Berhasil di Update');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {



    }

    public function comment()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Post::findOrFail($id);
        return view('dashboard.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada:
            if ($post->gambar) {
                Storage::delete('public/image/' . $post->gambar);
            }
            $image = $request->file('gambar');
            $path = $image->store('image','public');
            $name = basename($path);
            $post->gambar = $name;
        }
        $post->postingan = $request->postingan;
        $post->tag = $request->tag;

        $post->save();
        Alert::success('Post Edited', 'Postingan Berhasil Diedit');
        return redirect()->to('dashboard')->with('message', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function softdelete(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Alert::warning('Post Deleted', 'Postingan Berhasil Didelete');
        return redirect()->back()->with('success', 'Data Berhasil Dihapus Sementara');
    }
}

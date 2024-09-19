<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // $user = auth()->user();
        // $posts = Post::with('comments')->where('id', $user->id)->get();
        // return view('komentar.create',compact('user','posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi sebelum membuat/mencreate comentar
        $request->validate([
            'komentar' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hashtag' => 'nullable|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
        }
        // Proses Mencreate Komentar
        Comment::create([
            'id_user' => Auth::id(),          // Ambil id user yang sedang login
            'id_posts' => $request->id_posts,            // Id post yang dikomentari
            'komentar' => $request->komentar, // Komentar yang dimasukkan
            'image' => $imagePath,            // Gambar jika ada
            'hashtag' => $request->hashtag,   // Hashtag jika ada
        ]);

        Alert::success('Comment', 'Anda Berhasil Komentar');
        return redirect()->to('komentar.create')->with('message', 'Data Berhasil di Update');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::with('post', 'user')
                ->where('id_posts', $id)  // Filter berdasarkan id_posts
                ->orderBy('id', 'desc')    // Urutkan berdasarkan ID komentar secara descending
                ->get();
        return view('komentar.create', compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // mencari id dan table comments dan menampilkan datanya
        $edit = Comment::findOrFail($id);
        return view('komentar.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'komentar' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hashtag' => 'nullable|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
        }
        // Fungsi Untuk Mengupdate Komentar, berdasarkan id yang dipilih

        Comment::where('id',$id)->update([
            'id_user' => Auth::id(),          // Ambil id user yang sedang login
            'id_posts' => $request->id_posts,            // Id post yang dikomentari
            'komentar' => $request->komentar, // Komentar yang dimasukkan
            'image' => $imagePath,            // Gambar jika ada
            'hashtag' => $request->hashtag,   // Hashtag jika ada
        ]);

        Alert::success('Comment', 'Anda Berhasil Komentar');
        return redirect()->to('dashboard')->with('message', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
    public function softdelete(string $id)
    {
        // Mencari Komentar Berdasarkan id yang dikirim, lalu menjalankan fungsi delete.
        $comments = Comment::findOrFail($id);
        $comments->delete();
        Alert::warning('Komentar Deleted', 'Komentar Berhasil Didelete');
        return redirect()->back()->with('success', 'Data Berhasil Dihapus Sementara');
    }
}

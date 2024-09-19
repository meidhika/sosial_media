<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('profile.index',compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = User::findOrFail($id);
        return view('profile.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'foto_profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:55',
            'email' => 'required|string|email|max:55',
            'bio' => 'nullable|string',
        ]);


        $user = User::findOrFail($id);
        if ($request->hasFile('foto_profile')) {
            // Hapus gambar lama jika ada:
            if ($user->foto_profile) {
                Storage::delete('public/image/' . $user->foto_profile);
            }
            $image = $request->file('foto_profile');
            $path = $image->store('image','public');
            $name = basename($path);
            $user->foto_profile = $name;
        }
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();
        Alert::success('Profile Edited', 'Profile Berhasil Diedit');
        return redirect()->to('profile')->with('message', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

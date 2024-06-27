<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.table.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.table.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Mengupdate gambar profil jika ada
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/profiles'), $imageName);
    
            User::where('id', $id)->update([
                'profile_image' => 'uploads/profiles/' . $imageName,
            ]);
        }
    
        // Mengupdate informasi pengguna lainnya
        $userData = [
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'nama_usaha' => $request->nama_usaha,
            'tentang' => $request->tentang,
        ];
    
        // Memeriksa apakah ada input password baru
        if ($request->filled('password')) {
            // Enkripsi password baru
            $userData['password'] = bcrypt($request->password);
        }
    
        // Melakukan pembaruan data pengguna
        User::where('id', $id)->update($userData);
    
        return redirect()->route('table.index')->with('success', 'Profile updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('table.index')->with('success', 'User deleted successfully.');
    }
}

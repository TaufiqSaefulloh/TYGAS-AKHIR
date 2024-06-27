<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();//mengambil semua data kontak
        $data = [
            'title' => 'Daftar User', //judul
            'active' => 'register',//halaman yang yang sedang aktif
            'contacts' => $contacts,
        ];
        return view('register.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pengguna' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'nomor_hp' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'pengguna' => $request->pengguna,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'nama_pemilik_usaha' => 'required',
            'nik' => 'required',
            'no_kk' => 'required',
            'no_hp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan_terakhir' => 'required',
            'agama' => 'required',
            'kelurahan_desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'jenis_produk' => 'required',
        ]);

        $register = new Pendaftaran();
        $register->email = $request->input('email');
        $register->nama_pemilik_usaha = $request->input('nama_pemilik_usaha');
        $register->nik = $request->input('nik');
        $register->no_kk = $request->input('no_kk');
        $register->no_hp = $request->input('no_hp');
        $register->tempat_lahir = $request->input('tempat_lahir');
        $register->tanggal_lahir = $request->input('tanggal_lahir');
        $register->jenis_kelamin = $request->input('jenis_kelamin');
        $register->pendidikan_terakhir = $request->input('pendidikan_terakhir');
        $register->agama = $request->input('agama');
        $register->kelurahan_desa = $request->input('kelurahan_desa');
        $register->kecamatan = $request->input('kecamatan');
        $register->kabupaten_kota = $request->input('kabupaten_kota');
        $register->jenis_produk = $request->input('jenis_produk');
        $register->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}

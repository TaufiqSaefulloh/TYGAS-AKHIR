<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'nama'  => 'required|min:1',
            'bidang' => 'required|min:1',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/teams', $image->hashName());

        Team::create([
            'image' => $image->hashName(),
            'nama' => $request->nama,
            'bidang' => $request->bidang,
        ]);

        return redirect()->route('team.index')->with('success', 'Team Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('admin.team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bidang' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/teams', $image->hashName());
            $team->image = $image->hashName();
        }

        $team->nama = $request->nama;
        $team->bidang = $request->bidang;
        $team->save();

        return redirect()->route('team.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        // Hapus gambar dari penyimpanan
        Storage::delete('public/teams/'.$team->image);
    
        // Hapus kategori dari database
        $team->delete();

        return redirect()->route('team.index')->with('success', 'Data berhasil dihapus.');
    }
}

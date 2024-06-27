<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Bantuan',
            'active' => 'bantuan',
        ];
        return view('bantuan', $data);
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
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'pertanyaan' => 'required|string',
        ]);

        $form = Form::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pertanyaan' => $request->pertanyaan,
        ]);

        return redirect()->route('bantuan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $form = Form::findOrFail($id);
        $form->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
    public function tampilkan()
    {
        // Ambil semua data dari tabel forms
        $forms = Form::all();

        // Kirim data forms ke view
        return view('admin.form', ['forms' => $forms]);
    }
}

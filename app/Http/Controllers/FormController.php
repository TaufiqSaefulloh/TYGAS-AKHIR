<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Pendaftaran;
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
    public function tampil(){
        $pendaftaran = Pendaftaran::orderBy('created_at', 'desc')->get();
        return view('admin.pendaftaran', ['pendaftaran' => $pendaftaran]);
    }
    public function download(Request $request)
    {
        $date = $request->input('date');
        if ($date) {
            $pendaftaran = Pendaftaran::whereDate('created_at', $date)->get();
        } else {
            $pendaftaran = Pendaftaran::all();
        }

        $fileName = 'pendaftaran_' . ($date ?: 'all') . '.csv';
        $columns = [
            'ID', 'Nama Pemilik Usaha', 'Email', 'NIK', 'No KK', 'No HP', 'Tempat Lahir', 
            'Tanggal Lahir', 'Jenis Kelamin', 'Pendidikan Terakhir', 'Agama', 'Kelurahan/Desa', 
            'Kecamatan', 'Kabupaten/Kota', 'Jenis Produk'
        ];

        $callback = function() use ($pendaftaran, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($pendaftaran as $data) {
                fputcsv($file, [
                    $data->id,
                    $data->nama_pemilik_usaha,
                    $data->email,
                    $data->nik,
                    $data->no_kk,
                    $data->no_hp,
                    $data->tempat_lahir,
                    $data->tanggal_lahir,
                    $data->jenis_kelamin,
                    $data->pendidikan_terakhir,
                    $data->agama,
                    $data->kelurahan_desa,
                    $data->kecamatan,
                    $data->kabupaten_kota,
                    $data->jenis_produk
                ]);
            }
            fclose($file);
        };

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        return response()->stream($callback, 200, $headers);
    }
}

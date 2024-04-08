<?php

namespace App\Http\Controllers;

use App\Models\MhsKkn;
use App\Models\Kkn;
use Illuminate\Http\Request;

class MhsKknController extends Controller
{
    public function index()
    {
        $kkns = Kkn::all();
        return view('beranda', compact('kkns'));
    }

    public function create()
    {
        return view('daftar');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kkn' => 'required|string|max:255',
        ]);

        // Simpan data KKN baru
        $kkn = new Kkn();
        $kkn->nama_kkn = $request->nama_kkn;
        $kkn->masa_kegiatan = $request->masa_kegiatan;
        $kkn->jenis_kkn = $request->jenis_kkn;
        $kkn->masa_pendaftaran = $request->masa_pendaftaran;
        $kkn->tahun_ajaran = $request->tahun_ajaran;
        $kkn->semester = $request->semester;
        $kkn->kode_kkn = $request->kode_kkn;
        $kkn->minimal_sks = $request->minimal_sks;
        $kkn->kuota_peserta = $request->kuota_peserta;
        $kkn->save();

        // Redirect dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'KKN baru berhasil ditambahkan.');
    }
}

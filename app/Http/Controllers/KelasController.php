<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('cari');
        if ($search) {
            $kelas = Kelas::where('nama_kelas', 'LIKE', "%{$search}%")
                ->orWhere('program', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $kelas = Kelas::latest()->paginate(10);
        }

        return view('web.kelas.kelas', compact(['kelas']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string',
            'program' => 'required|string',
            'jurusan' => 'required|string',
            'wali_kelas' => 'required|string',
            'tahun_ajaran' => 'required',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'program' => $request->program,
            'jurusan' => $request->jurusan,
            'wali_kelas' => $request->wali_kelas,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()->to('/kelas')->with('success', 'Data berhasil di Simpan');
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
        $kelas = Kelas::findOrFail($id);
        return view('web.kelas.edit', compact(['kelas']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string',
            'program' => 'required|string',
            'jurusan' => 'required|string',
            'wali_kelas' => 'required|string',
            'tahun_ajaran' => 'required',
        ]);

        Kelas::findOrFail($id)->update([
            'nama_kelas' => $request->nama_kelas,
            'program' => $request->program,
            'jurusan' => $request->jurusan,
            'wali_kelas' => $request->wali_kelas,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()->to('/kelas')->with('success', 'Data berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Kelas::findOrFail($id)->delete();
        return redirect()->to('/kelas')->with('success', 'Data berhasil di Hapus');
    }
}

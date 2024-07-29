<?php

namespace App\Http\Controllers;

use App\Models\Mata_pelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
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
            $mata_pelajaran = Mata_pelajaran::where('nama', 'LIKE', "%{$search}%")
                ->orWhere('kode', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $mata_pelajaran = Mata_pelajaran::latest()->paginate(10);
        }

        return view('web.mata_pelajaran.mata_pelajaranindex', compact(['mata_pelajaran']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.mata_pelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'kode' => 'required|string',
        ]);

        Mata_pelajaran::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);

        return redirect()->to('/mata-pelajaran')->with('success', 'Data berhasil di Simpan');
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
        $matapelajaran = Mata_pelajaran::findOrFail($id);

        return view('web.mata_pelajaran.edit', compact(['matapelajaran']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nama' => 'required|string',
            'kode' => 'required|string',
        ]);

        Mata_pelajaran::findOrFail($id)->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);

        return redirect()->to('/mata-pelajaran')->with('success', 'Data berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mata_pelajaran::findOrFail($id)->delete();
        return redirect()->to('/mata-pelajaran')->with('success', 'Data berhasil di Ubah');
    }
}

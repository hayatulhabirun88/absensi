<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;

class EskulKategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            if ($user->level == 'siswa' || $user->level == 'orang_tua') {
                return redirect('/mobile/dashboard');
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eskulkategori = Ekstrakulikuler::paginate(10);
        return view('web.eskulkategori.eskulkategori', compact('eskulkategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.eskulkategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_eskul' => 'required|string'
        ]);


        Ekstrakulikuler::create([
            'nama_ekstrakulikuler' => $request->nama_eskul
        ]);

        return redirect()->to('/eskul/kategori')->with('success', 'Kategori Ekskul Berhasil di Tambah');
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
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
        return view('web.eskulkategori.edit', compact('ekstrakulikuler'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_eskul' => 'required|string'
        ]);

        Ekstrakulikuler::findOrFail($id)->update([
            'nama_ekstrakulikuler' => $request->nama_eskul
        ]);

        return redirect()->to('/eskul/kategori')->with('success', 'Kategori Ekskul Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        $ekstrakulikuler->delete();

        return redirect()->to('/eskul/kategori')->with('success', 'Data berhasil di hapus');
    }

    public function search(Request $request)
    {
        $query = $request->input('cari');

        // Lakukan pencarian di model Item
        $eskulkategori = Ekstrakulikuler::where('nama_ekstrakulikuler', 'LIKE', "%{$query}%")
            ->paginate(10);

        return view('web.eskulkategori.cari', compact('eskulkategori'));

    }
}

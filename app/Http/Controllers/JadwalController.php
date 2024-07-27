<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pembina;
use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;

class JadwalController extends Controller
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
        $jadwal = Jadwal::paginate();
        return view('web.jadwal.jadwal', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ekstrakulikuler = Ekstrakulikuler::all();
        $pembina = Pembina::all();
        return view('web.jadwal.create', compact(['ekstrakulikuler', 'pembina']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ekstrakulikuler' => 'required|string',
            'pembina' => 'required|string',
            'tempat' => 'required|string',
            'tgl_kegiatan' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        Jadwal::create([
            'tempat' => $request->tempat,
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ekstrakulikuler_id' => $request->nama_ekstrakulikuler,
            'pembina_id' => $request->pembina,
        ]);

        return redirect()->to('/eskul/jadwal')->with('success', 'Data berhasil di Simpan');
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
        $ekstrakulikuler = Ekstrakulikuler::all();
        $pembina = Pembina::all();
        $jadwal = Jadwal::findOrFail($id);
        return view('web.jadwal.edit', compact(['jadwal', 'ekstrakulikuler', 'pembina']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'nama_ekstrakulikuler' => 'required|string',
            'pembina' => 'required|string',
            'tempat' => 'required|string',
            'tgl_kegiatan' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal->tempat = $request->tempat;
        $jadwal->tgl_kegiatan = $request->tgl_kegiatan;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->ekstrakulikuler_id = $request->nama_ekstrakulikuler;
        $jadwal->pembina_id = $request->pembina;
        $jadwal->save();

        return redirect()->to('/eskul/jadwal')->with('success', 'Data berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()->to('/eskul/jadwal')->with('success', 'Data berhasil di hapus');
    }
}

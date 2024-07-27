<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use Illuminate\Http\Request;

class LombaController extends Controller
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
        $lomba = Lomba::paginate(10);
        return view('web.lomba.lomba', compact('lomba'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('web.lomba.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_lomba' => 'required|string',
            'tempat' => 'required|string',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'deskripsi' => 'required|string',
            'foto_utama' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        if ($request->file('foto_utama')) {
            $namafile = md5($request->file('foto_utama')->getClientOriginalName() . time()) . '.' . $request->file('foto_utama')->getClientOriginalExtension();
            $request->file('foto_utama')->move(public_path() . '/foto_lomba/', $namafile);
        } else {
            $namafile = "";
        }

        Lomba::create([
            'judul_lomba' => $request->judul_lomba,
            'tempat' => $request->tempat,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'deskripsi' => $request->deskripsi,
            'foto_utama' => $namafile,
        ]);


        return redirect()->to('/eskul/lomba')->with('success', 'Data berhasil di Simpan');
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
        $lomba = Lomba::findOrFail($id);
        return view('web.lomba.edit', compact('lomba'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lomba = Lomba::findOrFail($id);

        $request->validate([
            'judul_lomba' => 'required|string',
            'tempat' => 'required|string',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'deskripsi' => 'required|string',
            'foto_utama' => 'image|mimes:jpg,jpeg,png,gif',
        ]);

        if ($request->file('foto_utama')) {
            @unlink(public_path('/foto_lomba/' . $lomba->foto_utama));
            $namafile = md5($request->file('foto_utama')->getClientOriginalName() . time()) . '.' . $request->file('foto_utama')->getClientOriginalExtension();
            $request->file('foto_utama')->move(public_path() . '/foto_lomba/', $namafile);

            $lomba->foto_utama = $namafile;
        }

        $lomba->judul_lomba = $request->judul_lomba;
        $lomba->tempat = $request->tempat;
        $lomba->tgl_mulai = $request->tgl_mulai;
        $lomba->tgl_selesai = $request->tgl_selesai;
        $lomba->deskripsi = $request->deskripsi;
        $lomba->save();

        return redirect()->to('/eskul/lomba')->with('success', 'Data berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lomba = Lomba::findOrFail($id);

        @unlink(public_path('/foto_lomba/' . $lomba->foto_utama));

        $lomba->delete();

        return redirect()->to('/eskul/lomba')->with('success', 'Data berhasil di hapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;

class PendaftarController extends Controller
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
        $pendaftar = Pendaftar::paginate(10);
        return view('web.pendaftar.pendaftar', compact('pendaftar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ekstrakulikuler = Ekstrakulikuler::all();
        return view('web.pendaftar.create', compact('ekstrakulikuler'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'kelas' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'hobi' => 'string',
            'ekstrakulikuler' => 'required|integer',
            'email' => 'required|string',
            'no_hp' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'level' => 'siswa',
            'password' => bcrypt($request->password)
        ]);

        Pendaftar::create([
            'nama_lengkap' => $request->nama_lengkap,
            'kelas' => $request->kelas,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'hobi' => $request->hobi,
            'no_hp' => $request->no_hp,
            'ekstrakulikuler_id' => $request->ekstrakulikuler,
            'user_id' => $user->id,
        ]);


        return redirect()->to('/eskul/pendaftar')->with('success', 'Data berhasil di Simpan');


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
        $pendaftar = Pendaftar::findOrFail($id);
        $ekstrakulikuler = Ekstrakulikuler::all();
        return view('web.pendaftar.edit', compact('pendaftar', 'ekstrakulikuler'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string',
            'kelas' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'hobi' => 'string',
            'ekstrakulikuler' => 'required|integer',
            'no_hp' => 'required',
        ]);

        User::findOrFail($pendaftar->user_id)->update([
            'name' => $request->nama_lengkap,
            'level' => 'siswa',
        ]);

        $pendaftar->nama_lengkap = $request->nama_lengkap;
        $pendaftar->kelas = $request->kelas;
        $pendaftar->tempat_lahir = $request->tempat_lahir;
        $pendaftar->tgl_lahir = $request->tgl_lahir;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->hobi = $request->hobi;
        $pendaftar->no_hp = $request->no_hp;
        $pendaftar->ekstrakulikuler_id = $request->ekstrakulikuler;
        $pendaftar->save();


        return redirect()->to('/eskul/pendaftar')->with('success', 'Data berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        User::findOrFail($pendaftar->user_id)->delete();

        $pendaftar->delete();

        return redirect()->to('/eskul/pendaftar')->with('success', 'Data berhasil di hapus');
    }

    public function search(Request $request)
    {
        $query = $request->input('cari');

        // Lakukan pencarian di model Item
        $pendaftar = Pendaftar::where('nama_lengkap', 'LIKE', "%{$query}%")
            ->paginate(10);

        return view('web.pendaftar.cari', compact('pendaftar'));
    }
}

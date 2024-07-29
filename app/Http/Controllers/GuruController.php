<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
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
            $guru = Guru::where('nama_guru', 'LIKE', "%{$search}%")
                ->orWhere('nip', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $guru = Guru::latest()->paginate(10);
        }

        return view('web.guru.guru', compact(['guru']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string',
            'nama_guru' => 'required|string',
            'matapelajaran' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->nama_guru,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 'guru',
        ]);

        Guru::create([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'matapelajaran' => $request->matapelajaran,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'user_id' => $user->id,
        ]);

        return redirect()->to('/guru')->with('success', 'Data berhasil di Simpan');
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
        $guru = Guru::findOrFail($id);
        $user = User::findOrFail($guru->user_id);
        return view('web.guru.edit', compact(['guru', 'user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nip' => 'required|string',
            'nama_guru' => 'required|string',
            'matapelajaran' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required',
            'email' => 'required|email|unique:users,email,' . $guru->user_id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user = User::findOrFail($guru->user_id);

        $user->update([
            'name' => $request->nama_guru,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'level' => 'guru',
        ]);

        $guru->update([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'matapelajaran' => $request->matapelajaran,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->to('/guru')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);
        User::findOrFail($guru->user_id)->delete();
        $guru->delete();

        return redirect()->to('/guru')->with('success', 'Data berhasil di Hapus');
    }
}

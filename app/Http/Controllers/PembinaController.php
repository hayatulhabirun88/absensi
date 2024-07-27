<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembina;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PembinaController extends Controller
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
        $pembina = Pembina::paginate(10);
        return view('web.pembina.pembina', compact('pembina'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.pembina.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pembina' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required|min:6',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->nama_pembina,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 'pembina'
        ]);

        Pembina::create([
            'nama_pembina' => $request->nama_pembina,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'user_id' => $user->id
        ]);

        return redirect()->to('/pembina')->with('success', 'Data berhasil di Simpan');
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
        $pembina = Pembina::findOrFail($id);
        return view('web.pembina.edit', compact('pembina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembina = Pembina::findOrFail($id);

        $request->validate([
            'nama_pembina' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);


        $pembina->nama_pembina = $request->nama_pembina;
        $pembina->alamat = $request->alamat;
        $pembina->no_hp = $request->no_hp;
        $pembina->save();

        return redirect()->to('/pembina')->with('success', 'Data berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembina = Pembina::findOrFail($id);

        User::findOrFail($pembina->user_id)->delete();

        $pembina->delete();

        return redirect()->to('/pembina')->with('success', 'Data berhasil di hapus');
    }

    public function search(Request $request)
    {
        $query = $request->input('cari');

        // Lakukan pencarian di model Item
        $pembina = Pembina::where('nama_pembina', 'LIKE', "%{$query}%")
            ->paginate(10);

        return view('web.pembina.cari', compact('pembina'));
    }
}

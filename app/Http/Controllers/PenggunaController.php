<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
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
        $user = User::orderBy('id', 'desc')->paginate(10);
        return view('web.pengguna.pengguna', compact(['user']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => 'required|lowercase|email|max:255|string|unique:users,email',
            'password' => 'required|min:8',
            'level' => 'required'
        ]);

        $user = new User();
        $user->password = Hash::make($request->password);
        $user->name = $request->nama_pengguna;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->save();

        return redirect()->to('pengguna')->with('success', 'Data berhasil di tambah');
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
        $pengguna = User::findOrFail($id);
        return view('web.pengguna.edit', compact(['pengguna']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => 'required|lowercase|email|max:255|string|unique:users,email,' . $user->id,
            'level' => 'required',
        ]);

        if ($request->password) {
            $request->validate([
                'password' => 'required|min:8',
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->nama_pengguna;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->save();

        return redirect()->to('pengguna')->with('success', 'Data berhasil di tambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->to('pengguna')->with('success', 'Data berhasil di hapus');
    }

    public function search()
    {

    }
}

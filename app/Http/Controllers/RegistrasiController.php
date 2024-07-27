<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()) {
            return redirect('dashboard');
        }
        return view('web.registrasi.registrasi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|lowercase|email|max:255|string|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required|string',
            'no_tlp' => 'required',
            'level' => 'required',
            'dok_ktp' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        if ($request->file('dok_ktp')) {
            $namafile = md5($request->file('dok_ktp')->getClientOriginalName() . time()) . '.' . $request->file('dok_ktp')->getClientOriginalExtension();
            $request->file('dok_ktp')->move(public_path() . '/images/', $namafile);
        } else {
            $namafile = "";
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->no_tlp = $request->no_tlp;
        $user->dok_ktp = $namafile;
        $user->level = $request->level;
        $user->save();

        return redirect()->route('login')->with('success', 'Registrasi telah berhasil, silahkan login!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

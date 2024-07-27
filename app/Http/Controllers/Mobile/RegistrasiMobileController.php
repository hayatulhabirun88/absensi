<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Orangtua;
use App\Models\User;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;
use App\Http\Controllers\Controller;

class RegistrasiMobileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('check.dart');
        $this->middleware(function ($request, $next) {
            if (auth()->check()) {
                return redirect('mobile/dashboard');
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('mobile.auth.registrasi');
    }

    public function siswa()
    {
        $ekstrakulikuler = Ekstrakulikuler::all();
        return view('mobile.registrasi.siswa', compact(['ekstrakulikuler']));
    }

    public function orang_tua()
    {
        $siswa = Pendaftar::all();
        return view('mobile.registrasi.orang_tua', compact(['siswa']));
    }

    public function proses_registrasi_siswa(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'hobi' => 'nullable|string|max:100',
            'ekstrakulikuler' => 'required|integer|exists:ekstrakulikulers,id',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
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

        return redirect()->to('/mobile/login')->with('success', 'Selamat, Anda berhasil melakukan registrasi, silahkan melakukan login!');
    }
    public function proses_registrasi_orang_tua(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'siswa' => 'required|integer|exists:pendaftars,id',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'level' => 'orang_tua',
            'password' => bcrypt($request->password)
        ]);

        Orangtua::create([
            'nama_orangtua' => $request->nama_lengkap,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'pendaftar_id' => $request->siswa,
            'user_id' => $user->id,
        ]);

        return redirect()->to('/mobile/login')->with('success', 'Selamat, Anda berhasil melakukan registrasi, silahkan melakukan login!');
    }



}

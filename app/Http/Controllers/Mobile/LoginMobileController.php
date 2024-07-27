<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginMobileController extends Controller
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()) {
            return redirect('mobile/dashboard');
        }
        return view('mobile.auth.login');
    }

    /**
     * PROSES LOGIN DI MOBILE.
     */
    public function proses(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->level == "siswa" || $user->level == "orang_tua") {
                $request->session()->regenerate();

                return redirect()->intended('mobile/dashboard');
            } else {
                Auth::logout();
            }
        }

        return redirect()->to('/mobile/login')->with('error', 'Email atau password anda salah!');
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
        //
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

    /**
     * Show the form for creating a new resource.
     */

}

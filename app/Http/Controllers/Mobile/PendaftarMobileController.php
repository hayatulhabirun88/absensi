<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarMobileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('check.dart');
        $this->middleware(function ($request, $next) {
            if (!auth()->check()) {
                return redirect('mobile/login');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $pendaftar = Pendaftar::orderBy('id', 'desc')->paginate(10);
        return view('mobile.pendaftar.pendaftar', compact(['pendaftar']));
    }
}

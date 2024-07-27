<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalMobileController extends Controller
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
        $jadwal = Jadwal::orderBy('id', 'desc')->paginate(10);
        return view('mobile.jadwal.jadwal', compact(['jadwal']));
    }

}

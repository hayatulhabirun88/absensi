<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Orangtua;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresensiMobileController extends Controller
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
        $user_id = auth()->user()->id;

        $query = Presensi::leftJoin('pendaftars', 'pendaftars.id', '=', 'presensis.pendaftar_id')
            ->leftJoin('pembinas', 'pembinas.id', '=', 'presensis.pembina_id')
            ->leftJoin('ekstrakulikulers', 'ekstrakulikulers.id', '=', 'presensis.ekstrakulikuler_id')
            ->orderBy('presensis.id', 'desc')
            ->select(
                'pembinas.nama_pembina as nama_pembina',
                'ekstrakulikulers.nama_ekstrakulikuler as nama_ekstrakulikuler',
                'presensis.tgl_presensi',
                'presensis.status_kehadiran'
            );

        if (auth()->user()->level == "orang_tua") {
            $orangtua = Orangtua::where('user_id', $user_id)->first();
            $query->where('presensis.pendaftar_id', $orangtua->pendaftar_id);
        } else {
            $query->where('pendaftars.user_id', $user_id);
        }

        $presensi = $query->paginate(10);

        return view('mobile.presensi.presensi', compact(['presensi']));
    }
}

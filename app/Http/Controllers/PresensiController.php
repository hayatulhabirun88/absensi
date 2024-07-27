<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use App\Models\Presensi;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;
use Illuminate\Support\Facades\Session;

class PresensiController extends Controller
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
    public function index(Request $request)
    {
        $pembina = Pembina::all();
        $ekstrakulikuler = Ekstrakulikuler::all();

        if ($request->input('ekstrakulikuler')) {
            $pendaftar = Pendaftar::where('ekstrakulikuler_id', $request->input('ekstrakulikuler'))->paginate(10);
        } else {
            $pendaftar = Pendaftar::paginate(10);

        }
        return view('web.presensi.presensi', compact(['pendaftar', 'ekstrakulikuler', 'pembina']));

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

    public function ajax_presensi(Request $request)
    {
        $request->validate([
            'tgl_presensi' => 'required|date',
            'status_kehadiran' => 'required|in:Hadir,Tidak Hadir',
            'ekstrakulikuler_id' => 'required|exists:ekstrakulikulers,id',
            'pendaftar_id' => 'required|exists:pendaftars,id',
            'pembina_id' => 'required|exists:pembinas,id',
        ]);

        $presensi = Presensi::updateOrCreate(
            [
                'tgl_presensi' => $request->tgl_presensi,
                'pendaftar_id' => $request->pendaftar_id,
            ],
            [
                'status_kehadiran' => $request->status_kehadiran,
                'ekstrakulikuler_id' => $request->ekstrakulikuler_id,
                'pembina_id' => $request->pembina_id,
            ]
        );

        return response()->json(['message' => 'Status updated successfully.', 'presensi' => $presensi]);
    }

    public function laporan(Request $request)
    {
        // Ambil data dari session jika ada, jika tidak, lakukan query default
        if (Session::has('presensi_ids')) {
            $presensiIds = Session::get('presensi_ids');
            $presensi = Presensi::whereIn('id', $presensiIds)->orderBy('id', 'desc')->orderBy('tgl_presensi', 'desc')->paginate(10);
        } else {
            $presensi = Presensi::orderBy('id', 'desc')->orderBy('tgl_presensi', 'desc')->paginate(10);
        }

        // Ambil data tambahan
        $ekstrakulikuler = Ekstrakulikuler::all();
        $pembina = Pembina::all();

        // Kembalikan hasil ke view
        return view('web.presensi.laporan', compact(['ekstrakulikuler', 'presensi', 'pembina']));
    }

    public function filter_laporan(Request $request)
    {
        // Ambil input dari request
        $dataekskul = $request->input('ekstrakulikuler');
        $datapembina = $request->input('pembina');
        $datatglawal = $request->input('tgl_awal');
        $datatglakhir = $request->input('tgl_akhir');

        // Mulai query
        $presensiQuery = Presensi::orderBy('tgl_presensi', 'desc')->orderBy('id', 'desc');

        // Tambahkan kondisi jika input tidak kosong
        if ($dataekskul) {
            $presensiQuery->where('ekstrakulikuler_id', $dataekskul);
        }
        if ($datapembina) {
            $presensiQuery->where('pembina_id', $datapembina);
        }
        if ($datatglawal && $datatglakhir) {
            $presensiQuery->whereBetween('tgl_presensi', [$datatglawal, $datatglakhir]);
        } elseif ($datatglawal) {
            $presensiQuery->where('tgl_presensi', '>=', $datatglawal);
        } elseif ($datatglakhir) {
            $presensiQuery->where('tgl_presensi', '<=', $datatglakhir);
        }

        // Lakukan paginasi
        $presensi = $presensiQuery->paginate(10);

        // Simpan ID presensi ke dalam session
        $presensiIds = $presensi->pluck('id')->toArray();
        session(['presensi_ids' => $presensiIds]);

        // Ambil data tambahan
        $ekstrakulikuler = Ekstrakulikuler::all();
        $pembina = Pembina::all();

        // Kembalikan hasil ke view
        return view('web.presensi.laporan', compact(['ekstrakulikuler', 'presensi', 'pembina']));

    }

    public function laporan_all()
    {
        session()->forget('presensi_ids');
        return redirect()->to('/presensi/laporan');
    }
}

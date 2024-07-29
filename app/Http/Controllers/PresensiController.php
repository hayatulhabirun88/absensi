<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Models\Mata_pelajaran;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all();
        $siswa = Siswa::where('kelas_id', session()->get('kelas_id'))->paginate(20);
        $matapelajaran = Mata_pelajaran::all();
        $kelas = Kelas::all();
        return view('web.presensi.presensi', compact(['guru', 'siswa', 'matapelajaran', 'kelas']));
    }

    public function filterLaporan(Request $request)
    {
        $kelasId = $request->input('kelas');
        $tglAwal = $request->input('tgl_awal');
        $tglAkhir = $request->input('tgl_akhir');

        $request->session()->put('filter.kelas', $kelasId);
        $request->session()->put('filter.tgl_awal', $tglAwal);
        $request->session()->put('filter.tgl_akhir', $tglAkhir);

        $query = Presensi::with(['siswa', 'guru', 'mataPelajaran']);

        if ($kelasId) {
            $query->whereHas('siswa', function ($q) use ($kelasId) {
                $q->where('kelas_id', $kelasId);
            });
        }

        if ($tglAwal && $tglAkhir) {
            $query->whereBetween('tanggal', [$tglAwal, $tglAkhir]);
        } elseif ($tglAwal) {
            $query->whereDate('tanggal', '>=', $tglAwal);
        } elseif ($tglAkhir) {
            $query->whereDate('tanggal', '<=', $tglAkhir);
        }

        $presensi = $query->paginate(20);
        $kelas = Kelas::all();

        return view('web.presensi.laporan', compact('presensi', 'kelas'));
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

    public function simpan_sesi(Request $request)
    {
        $request->validate([
            'guru' => 'required|exists:gurus,id',
            'matapelajaran' => 'required|exists:mata_pelajarans,id',
            'tgl_presensi' => 'required|date',
            'kelas' => 'required|exists:kelas,id',
        ]);

        Session::put('guru_id', $request->guru);
        Session::put('matapelajaran', $request->matapelajaran);
        Session::put('tgl_presensi', $request->tgl_presensi);
        Session::put('kelas_id', $request->kelas);
        return redirect()->back()->with('success', 'Silahkan melakukan absen');
    }

    public function ajax_update_presensi(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'status' => ['required', 'regex:/\b(Hadir|Sakit|Izin|Alpa|Terlambat)\b/'],
        ]);

        $presensi = Presensi::updateOrCreate(
            [
                'siswa_id' => $request->siswa_id,
                'mata_pelajaran_id' => session()->get('matapelajaran'),
                'tanggal' => session()->get('tgl_presensi'),
                'kelas_id' => session()->get('kelas_id'),
                'guru_id' => session()->get('guru_id'),
            ],
            [
                'status' => $request->status,
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Siswa an. ' . $presensi->siswa->nama . ' Berhasil Absen dengan status ' . $presensi->status,
            'status_kehadiran' => $presensi->status,
            'siswa_id' => $presensi->siswa->id,
        ], 200);
    }

    public function laporan()
    {
        $presensi = Presensi::latest()->paginate(10);
        $kelas = Kelas::all();
        return view('web.presensi.laporan', compact(['presensi', 'kelas']));
    }

    public function exportLaporan(Request $request)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Fetch data
        $query = Presensi::with(['siswa', 'guru', 'mataPelajaran']);

        $kelas = $request->session()->get('filter.kelas');
        $tglAwal = $request->session()->get('filter.tgl_awal');
        $tglAkhir = $request->session()->get('filter.tgl_akhir');

        if ($kelas) {
            $query->whereHas('siswa', function ($q) use ($kelas) {
                $q->where('kelas_id', $kelas);
            });
        }

        if ($tglAwal && $tglAkhir) {
            $query->whereBetween('tanggal', [$tglAwal, $tglAkhir]);
        } elseif ($tglAwal) {
            $query->whereDate('tanggal', '>=', $tglAwal);
        } elseif ($tglAkhir) {
            $query->whereDate('tanggal', '<=', $tglAkhir);
        }

        $presensi = $query->get();

        // Set title
        $sheet->mergeCells('A1:H1');
        if ($tglAwal) {
            $sheet->setCellValue('A1', 'Laporan Absensi Tanggal ' . @$tglAwal . ' ' . @$tglAkhir . ' ' . auth()->user()->name);
        } else {
            $sheet->setCellValue('A1', 'Laporan Absensi ' . auth()->user()->name);
        }
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);

        // Add headings
        $headings = ['Tanggal', 'Nama Siswa', 'Kelas', 'Program', 'Jurusan', 'Status Kehadiran', 'Mata Pelajaran', 'Guru'];
        $sheet->fromArray($headings, NULL, 'A2');

        // Apply border style to headings
        $headerCells = 'A2:H2';
        $sheet->getStyle($headerCells)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle($headerCells)->getFont()->setBold(true);

        // Add data to the sheet
        $row = 3;
        foreach ($presensi as $data) {
            $sheet->fromArray([
                $data->tanggal,
                $data->siswa->nama,
                $data->siswa->kelas->nama_kelas,
                $data->siswa->kelas->program,
                $data->siswa->kelas->jurusan,
                $data->status,
                $data->mataPelajaran->nama,
                $data->guru->nama_guru,
            ], NULL, 'A' . $row++);
        }

        // Apply border style to data
        $dataCells = 'A3:H' . ($row - 1);
        $sheet->getStyle($dataCells)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Auto-size columns
        foreach (range('A', 'H') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }


        $writer = new Xlsx($spreadsheet);
        $filename = 'presensi_report_' . $data->guru->nama_guru . '-' . $data->tanggal . '.xlsx';

        return response()->stream(
            function () use ($writer) {
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]
        );

    }
}

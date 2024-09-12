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

    public function ajax_delete_presensi(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
        ]);

        Presensi::where(
            [
                'siswa_id' => $request->siswa_id,
                'mata_pelajaran_id' => session()->get('matapelajaran'),
                'tanggal' => session()->get('tgl_presensi'),
                'kelas_id' => session()->get('kelas_id'),
                'guru_id' => session()->get('guru_id'),
            ],
        )->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Presensi Berhasil di hapus',
            'status_kehadiran' => "Belum Absen",
            'siswa_id' => $request->siswa_id,
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

    public function proses_report_bulanan(Request $request)
    {
        $request->validate([
            'jenis_laporan' => 'required',
            'kelas' => 'required',
            'guru' => 'required',
            'mata_pelajaran' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
        ], [
            'jenis_laporan.required' => 'Jenis Laporan wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'guru.required' => 'Guru wajib diisi.',
            'mata_pelajaran.required' => 'Mata Pelajaran wajib diisi.',
            'tahun.required' => 'Tahun wajib diisi.',
            'bulan.required' => 'Bulan wajib diisi.',
        ]);

        $bulan = $request->bulan;

        // Array pemetaan nomor bulan ke nama bulan
        $bulanArray = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        // Mengonversi nomor bulan ke nama bulan
        $namaBulan = isset($bulanArray[$bulan]) ? $bulanArray[$bulan] : '';
        // Mengambil tahun dan bulan dari request
        $tahun = explode('/', $request->tahun)[0];


        if ($request->jenis_laporan == 'daftar_hadir_bulanan') {

            $presensi = Presensi::query();
            $presensi->where('kelas_id', $request->kelas);
            $presensi->where('guru_id', $request->guru);
            $presensi->where('mata_pelajaran_id', $request->mata_pelajaran);
            $presensi->whereYear('tanggal', $tahun);
            $presensi->whereMonth('tanggal', $request->bulan);
            $presensi = $presensi->get();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->mergeCells('A1:H1');

            $sheet->setCellValue('A1', 'Laporan Absensi Bulan ' . $namaBulan . ' Tahun ' . $tahun . ' Kelas  ' . Kelas::find($request->kelas)->nama_kelas);

            $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);

            // Add headings
            $headings = ['Tanggal', 'Nama Siswa', 'Kelas', 'Program', 'Jurusan', 'Status Kehadiran', 'Mata Pelajaran', 'Guru'];
            $sheet->fromArray($headings, NULL, 'A3');

            // Apply border style to headings
            $headerCells = 'A3:H3';
            $sheet->getStyle($headerCells)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle($headerCells)->getFont()->setBold(true);

            // Add data to the sheet
            $row = 4;
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
            $filename = 'presensi_daftar_hadir_' . Guru::findOrFail($request->guru)->nama_guru . '-' . $request->bulan . '' . $tahun . '.xlsx';

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
        } else {


            // Query database
            $presensi = Presensi::query()
                ->select('tanggal', 'siswa_id', 'kelas_id', 'mata_pelajaran_id', 'guru_id', 'status')
                ->with([
                    'siswa' => function ($query) {
                        $query->select('id', 'nama', 'kelas_id');
                    },
                    'siswa.kelas' => function ($query) {
                        $query->select('id', 'nama_kelas', 'program', 'jurusan');
                    },
                    'mataPelajaran' => function ($query) {
                        $query->select('id', 'nama');
                    },
                    'guru' => function ($query) {
                        $query->select('id', 'nama_guru');
                    }
                ])
                ->where('kelas_id', $request->kelas)
                ->where('guru_id', $request->guru)
                ->where('mata_pelajaran_id', $request->mata_pelajaran)
                ->whereYear('tanggal', $tahun)
                ->whereMonth('tanggal', $bulan)
                ->get();

            // Mengelompokkan data berdasarkan siswa
            $rekap = $presensi->groupBy('siswa_id')->map(function ($items) {
                return [
                    'tanggal' => $items->pluck('tanggal')->unique()->implode(', '),
                    'kelas' => $items->first()->siswa->kelas->nama_kelas,
                    'program' => $items->first()->siswa->kelas->program,
                    'jurusan' => $items->first()->siswa->kelas->jurusan,
                    'nama_siswa' => $items->first()->siswa->nama,
                    'hadir' => $items->where('status', 'Hadir')->count(),
                    'terlambat' => $items->where('status', 'Terlambat')->count(),
                    'sakit' => $items->where('status', 'Sakit')->count(),
                    'izin' => $items->where('status', 'Izin')->count(),
                    'alpha' => $items->where('status', 'Alpa')->count(),
                    'mata_pelajaran' => $items->first()->mataPelajaran->nama,
                    'guru' => $items->first()->guru->nama_guru,
                ];
            });

            // Membuat spreadsheet baru
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Menulis header
            $sheet->mergeCells('A1:H1');
            $sheet->setCellValue('A1', 'Rekap Absensi Bulan ' . $namaBulan . ' Tahun ' . $tahun);
            $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);

            // Menulis informasi di atas tabel
            $sheet->setCellValue('A3', 'Nama Guru');
            $sheet->getStyle('C3')->getFont()->setBold(true);
            $sheet->setCellValue('C3', ': ' . Guru::find($request->guru)->nama_guru);
            $sheet->setCellValue('A4', 'Mata Pelajaran');
            $sheet->setCellValue('C4', ': ' . Mata_pelajaran::find($request->mata_pelajaran)->nama);
            $sheet->setCellValue('A5', 'Kelas');
            $sheet->setCellValue('C5', ': ' . Kelas::find($request->kelas)->nama_kelas);
            $sheet->setCellValue('A6', 'Program');
            $sheet->setCellValue('C6', ': ' . Kelas::find($request->kelas)->program);
            $sheet->setCellValue('A7', 'Jurusan');
            $sheet->setCellValue('C7', ': ' . Kelas::find($request->kelas)->jurusan);

            // Menggabungkan sel di bagian informasi
            $sheet->mergeCells('A3:B3');
            $sheet->mergeCells('A4:B4');
            $sheet->mergeCells('A5:B5');
            $sheet->mergeCells('A6:B6');
            $sheet->mergeCells('A7:B7');

            // Menulis judul kolom
            $headings = ['No', 'Nama Siswa', 'Kelas', 'Hadir', 'Terlambat', 'Sakit', 'Izin', 'Alpha',];
            $sheet->fromArray($headings, NULL, 'A9');

            // Terapkan border pada header
            $headerCells = 'A9:H9';
            $sheet->getStyle($headerCells)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle($headerCells)->getFont()->setBold(true);

            // Menulis data ke sheet dengan nomor urut yang benar
            $row = 10;
            $i = 1;
            foreach ($rekap as $index => $data) {
                $sheet->fromArray([
                    $i++, // Nomor urut mulai dari 1
                    $data['nama_siswa'],
                    $data['kelas'],
                    $data['hadir'],
                    $data['terlambat'],
                    $data['sakit'],
                    $data['izin'],
                    $data['alpha'],
                ], NULL, 'A' . $row++);
            }

            // Terapkan border pada data
            $dataCells = 'A9:H' . ($row - 1);
            $sheet->getStyle($dataCells)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            // Mengatur alignment kolom tertentu ke tengah
            $centerColumns = ['A', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
            foreach ($centerColumns as $col) {
                $sheet->getStyle($col . '9:' . $col . ($row - 1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            }

            // Menambahkan tiga baris kosong
            $row += 2; // Menambahkan 3 baris kosong

            $spasi = str_repeat(' ', 10);
            // Menulis informasi tambahan
            $sheet->setCellValue('E' . $row, 'Burangasi, ' . $spasi . $namaBulan . ' ' . $tahun);
            $sheet->mergeCells('E' . $row . ':H' . $row);
            $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $row++;

            // Menulis informasi tambahan
            $sheet->setCellValue('E' . $row, 'MENGETAHUI,');
            $sheet->mergeCells('E' . $row . ':H' . $row);
            $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $row++;

            $sheet->setCellValue('E' . $row, 'KEPALA SMA NEGERI 3 LAPANDEWA');
            $sheet->mergeCells('E' . $row . ':H' . $row);
            $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $row += 5; // Menambahkan 3 baris kosong tambahan

            $sheet->setCellValue('E' . $row, 'LA JIDU, S.Pd');
            $sheet->getStyle('E' . $row)->getFont()->setBold(true);
            $sheet->mergeCells('E' . $row . ':H' . $row);
            $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $row++;

            $sheet->setCellValue('E' . $row, 'NIP. 19821231 200903 1 009');
            $sheet->mergeCells('E' . $row . ':H' . $row);
            $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


            // Auto-size kolom
            foreach (range('A', 'H') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            // Menyimpan file Excel
            $writer = new Xlsx($spreadsheet);
            $filename = 'presensi_rekap_' . Kelas::find($request->kelas)->nama_kelas . '-' . $namaBulan . '-' . $tahun . '.xlsx';

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

    public function view_report_bulanan()
    {
        $kelas = Kelas::all();
        $guru = Guru::all();
        $matapelajaran = Mata_pelajaran::all();
        return view('web.presensi.bulanan', compact(['kelas', 'guru', 'matapelajaran']));
    }


}

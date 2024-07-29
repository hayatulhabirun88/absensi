<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('cari');
        if ($search) {
            $siswa = Siswa::where('nama', 'LIKE', "%{$search}%")
                ->orWhere('nis', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $siswa = Siswa::paginate(10);
        }

        return view('web.siswa.siswa', compact(['siswa']));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('web.siswa.create', compact(['kelas']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nis' => 'required|string',
            'kelas_id' => 'required|string',
        ]);

        Siswa::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->to('/siswa')->with('success', 'Data berhasil di Simpan');
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
        $kelas = Kelas::all();
        $siswa = Siswa::findOrFail($id);
        return view('web.siswa.edit', compact(['siswa', 'kelas']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'nis' => 'required|string',
            'kelas_id' => 'required|string',
        ]);

        Siswa::findOrFail($id)->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->to('/siswa')->with('success', 'Data berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::findOrFail($id)->delete();
        return redirect()->to('/siswa')->with('success', 'Data berhasil di Hapus');
    }

    public function import_data_view()
    {
        return view('web.siswa.import');
    }

    public function import_data(Request $request)
    {
        $request->validate([
            'file_siswa' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        $file = $request->file('file_siswa');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // Assuming your columns are mapped to these fields
        foreach ($sheetData as $index => $row) {
            if ($index == 1) {
                continue;
            }

            Siswa::create([
                'nis' => $row['B'],
                'nama' => $row['C'],
                'kelas_id' => $row['D'],
            ]);
        }

        return redirect()->to('siswa')->with('success', 'Data berhasil diimpor.');

    }
}

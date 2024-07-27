<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;

class GalleryController extends Controller
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
    public function index()
    {
        $gallery = Album::paginate(10);
        return view('web.gallery.gallery', compact(['gallery']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ekstrakulikuler = Ekstrakulikuler::all();
        return view('web.gallery.create', compact(['ekstrakulikuler']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_album' => 'required|string',
            'ekstrakulikuler' => 'required',
            'foto.*' => 'image|mimes:jpg,png,gif,jpeg'
        ]);

        $album = Album::create([
            'nama_album' => $request->nama_album,
            'ekstrakulikuler_id' => $request->ekstrakulikuler
        ]);

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $photo) {
                $namafile = md5($photo->getClientOriginalName() . time()) . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path() . '/foto/', $namafile);
                Gallery::create([
                    'foto' => $namafile,
                    'album_id' => $album->id
                ]);
            }
        }

        return redirect()->to('/eskul/gallery')->with('success', 'Data berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $album = Album::findOrFail($id);
        $gallery = Gallery::where('album_id', $id)->get();
        return view('web.gallery.show', compact(['album', 'gallery']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = Album::findOrFail($id);
        $ekstrakulikuler = Ekstrakulikuler::all();
        return view('web.gallery.edit', compact(['album', 'ekstrakulikuler']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $album = Album::findOrFail($id);
        $request->validate([
            'nama_album' => 'required|string',
            'ekstrakulikuler' => 'required',
            'foto.*' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        // Hapus foto lama jika ada file baru yang diunggah
        if ($request->file('foto')) {

            $oldPhotos = Gallery::where('album_id', $album->id)->get();

            foreach ($oldPhotos as $oldPhoto) {
                @unlink(public_path('foto/' . $oldPhoto->foto));
                $oldPhoto->delete();
            }

            // Upload dan simpan foto baru
            foreach ($request->file('foto') as $photo) {
                $namafile = md5($photo->getClientOriginalName() . time()) . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('/foto/'), $namafile);
                Gallery::create([
                    'foto' => $namafile,
                    'album_id' => $album->id
                ]);
            }
        }

        $album->nama_album = $request->nama_album;
        $album->ekstrakulikuler_id = $request->ekstrakulikuler;
        $album->save();

        return redirect()->to('/eskul/gallery/')->with('success', 'Data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::findOrFail($id);

        $gallery = Gallery::where('album_id', $id);
        if ($gallery->get()) {
            foreach ($gallery->get() as $galleri) {
                @unlink(public_path('/foto/' . $galleri->foto));
            }
            $gallery->delete();
        }

        $album->delete();

        return redirect()->to('/eskul/gallery')->with('success', 'Data berhasil di hapus');
    }
}

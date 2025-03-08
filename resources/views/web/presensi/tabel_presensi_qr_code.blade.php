<table class="table table-responsive">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Kelas</td>
            <td>Tanggal</td>
            <td>Jam Absen</td>
            <td>Status Kehadiran</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($presensihariini->latest()->paginate(15) as $index => $pres)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pres->siswa->nama }}</td>
                <td>{{ $pres->kelas->nama_kelas }} {{ $pres->kelas->program }} {{ $pres->kelas->jurusan }}</td>
                <td>{{ $pres->tanggal }}</td>
                <td>{{ $pres->jam_absen }}</td>
                <td>{{ $pres->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h6 class="text-center">Total Siswa yang Hadir : {{ $presensihariini->count() }}</h6>

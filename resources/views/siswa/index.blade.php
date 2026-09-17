<!DOCTYPE html>
<html lang="id">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Daftar Data Siswa</title>
 
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
 
<body class="bg-light">

<div class="container mt-5 mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Data Siswa</h4>
        <a href="{{ route('siswa.create') }}" class="btn btn-success btn-sm">+
            Tambah Siswa Baru
        </a>
    </div>

@if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
@endif
 
<div class="container mt-5">
 
    <div class="card shadow-sm border-0">
 
        <div class="card-header bg-primary text-white py-3">
            <h4 class="card-title mb-0 fw-bold">
                DATA INDUK SISWA
            </h4>
 
            <p class="mb-0 text-white-50">
                Menampilkan data langsung dari database menggunakan Eloquent ORM
            </p>
        </div>
 
        <div class="card-body p-4">
 
            @if($daftarSiswa->isEmpty())
 
                <div class="alert alert-warning text-center">
                    Belum ada data siswa di dalam database.
                    Silakan jalankan Seeder terlebih dahulu!
                </div>
 
            @else
 
                <div class="table-responsive">
 
                    <table class="table table-striped table-hover align-middle border">
 
                        <thead class="table-dark">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="10%">NISN</th>
                                <th width="25%">Nama Lengkap</th>
                                <th width="20%">Tempat, Tgl Lahir</th>
                                <th width="10%">L/P</th>
                                <th width="20%">Nomor HP</th>
                                <th width='25%'>Alamat</th>
                            </tr>
                        </thead>
 
                        <tbody>
 
                            @foreach($daftarSiswa as $siswa)
 
                                <tr>
 
                                    <td class="text-center fw-bold">
                                        {{ $loop->iteration }}
                                    </td>
 
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ $siswa->nisn }}
                                        </span>
                                    </td>
 
                                    <td class="fw-semibold">
                                        {{ $siswa->nama_lengkap }}
                                    </td>
 
                                    <td>
                                        {{ $siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}
                                    </td>
 
                                    <td>
                                        @if($siswa->jenis_kelamin == 'L')
                                            <span class="badge bg-info text-dark">L</span>
                                        @else
                                            <span class="badge bg-danger text-white">P</span>
                                        @endif
                                    </td>
 
                                    <td>
                                        {{ $siswa->nomor_hp }}
                                    </td>

                                    <td>
                                        {{ $siswa->alamat }}
                                    </td>
 
                                </tr>
 
                            @endforeach
 
                        </tbody>
 
                    </table>
 
                </div>
 
                <div class="mt-3 text-muted small">
                    Total Data Terhitung:
                    <strong>{{ $daftarSiswa->count() }}</strong> siswa.
                </div>
 
            @endif
 
        </div>
 
    </div>
 
</div>
 
</body>
</html>
 
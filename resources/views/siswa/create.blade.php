<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Data Siswa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card border-0 shadow-sm rounded">

                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Tambah Data Siswa Baru</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('siswa.store') }}" method="POST">

                        @csrf

                        {{-- NISN --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                NISN (10 Digit)
                            </label>

                            <input
                                type="text"
                                class="form-control @error('nisn') is-invalid @enderror"
                                name="nisn"
                                value="{{ old('nisn') }}"
                                placeholder="Masukkan NISN"
                            >

                            @error('nisn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Nama Lengkap --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                name="nama_lengkap"
                                value="{{ old('nama_lengkap') }}"
                                placeholder="Masukkan Nama Lengkap"
                            >

                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Tempat Lahir --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Tempat Lahir
                            </label>

                            <input
                                type="text"
                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                name="tempat_lahir"
                                value="{{ old('tempat_lahir') }}"
                                placeholder="Masukkan Tempat Lahir"
                            >

                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Tanggal Lahir
                            </label>

                            <input
                                type="date"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}"
                            >

                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Jenis Kelamin
                            </label>

                            <select
                                class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                name="jenis_kelamin"
                            >
                                <option value="">
                                    -- Pilih Jenis Kelamin --
                                </option>

                                <option
                                    value="L"
                                    {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}
                                >
                                    Laki-laki
                                </option>

                                <option
                                    value="P"
                                    {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}
                                >
                                    Perempuan
                                </option>
                            </select>

                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Alamat Rumah
                            </label>

                            <textarea
                                class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat"
                                rows="3"
                                placeholder="Masukkan Alamat Rumah"
                            >{{ old('alamat') }}</textarea>

                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Nomor HP --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Nomor Handphone
                            </label>

                            <input
                                type="text"
                                class="form-control @error('nomor_hp') is-invalid @enderror"
                                name="nomor_hp"
                                value="{{ old('nomor_hp') }}"
                                placeholder="Masukkan Nomor Handphone"
                            >

                            @error('nomor_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="d-grid gap-2">

                            <button
                                type="submit"
                                class="btn btn-dark"
                            >
                                Simpan Data
                            </button>

                            <a
                                href="{{ route('siswa.index') }}"
                                class="btn btn-secondary"
                            >
                                Kembali
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
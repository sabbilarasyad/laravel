<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $daftarSiswa = Siswa::orderBy('nama_lengkap', 'asc')->get();
        return view('siswa.index', compact('daftarSiswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn'          => 'required|numeric|digits:10|unique:siswas,nisn',
            'nama_lengkap'  => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat'        => 'required|string',
            'nomor_hp'      => 'required|numeric|digits_between:10,15',
        ],[
            'required' => ':attribute wajib diisi.',
            'unique' => ':attribute sudah terdaftar di sistem.',
            'numeric' => ':attribute harus berupa angka.',
            'digits' => ':attribute harus terdiri dari :digits digit.',
        ]);

        Siswa::create($validatedData);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nisn'          => 'required|numeric|digits:10|unique:siswas,nisn,' . $id,
            'nama_lengkap'  => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat'        => 'required|string',
            'nomor_hp'      => 'required|numeric|digits_between:10,15',
        ], [
            'required' => ':attribute wajib diisi.',
            'unique' => ':attribute sudah terdaftar di sistem.',
            'numeric' => ':attribute harus berupa angka.',
            'digits' => ':attribute harus terdiri dari :digits digit.',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($validatedData);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus secara permanen!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Menampilkan semua data (READ)
     */
    public function index()
    {
        // Ambil semua data dari tabel people
        $people = Person::all();
        
        // Tampilkan view index dengan mengirim data
        return view('people.index', compact('people'));
    }

    /**
     * Menampilkan form tambah data
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Menyimpan data baru ke database (CREATE)
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:1|max:150',
        ]);

        // Simpan data ke database
        Person::create([
            'nama' => $request->nama,
            'umur' => $request->umur,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('people.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail data (optional - bisa diabaikan)
     */
    public function show(Person $person)
    {
        return view('people.show', compact('person'));
    }

    /**
     * Menampilkan form edit data
     */
    public function edit(Person $person)
    {
        return view('people.edit', compact('person'));
    }

    /**
     * Mengupdate data di database (UPDATE)
     */
    public function update(Request $request, Person $person)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:1|max:150',
        ]);

        // Update data
        $person->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('people.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Menghapus data dari database (DELETE)
     */
    public function destroy(Person $person)
    {
        // Hapus data
        $person->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('people.index')->with('success', 'Data berhasil dihapus!');
    }
}
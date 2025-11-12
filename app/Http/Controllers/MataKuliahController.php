<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Matakuliah::all();
        return view('IndexMataKuliah', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mk = new Matakuliah();
        return view('CreateMataKuliah', compact('mk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:matakuliah,kode',
            'nama_matakuliah' => 'required',
        ]);

        Matakuliah::create($request->only('kode', 'nama_matakuliah'));

        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
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
    public function edit(Matakuliah $matakuliah)
    {
        $mk = $matakuliah;
        return view('CreateMataKuliah', compact('mk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' => 'required|unique:matakuliah,kode,' . $id,
            'nama_matakuliah' => 'required',
        ]);

        $mk = Matakuliah::findOrFail($id);
        $mk->update($request->only('kode', 'nama_matakuliah'));

        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Matakuliah::destroy($id);
        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}

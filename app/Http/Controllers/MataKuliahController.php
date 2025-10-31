<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('CreateMataKuliah');
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

        $mk = new Matakuliah();
        $mk->id = Str::uuid();
        $mk->kode = $request->kode;
        $mk->nama_matakuliah = $request->nama_matakuliah;
        $mk->save();

        return redirect('/matakuliah')->with('success', 'Mata kuliah berhasil ditambahkan.');
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
        return view('EditMataKuliah', ['mk' => $matakuliah]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mk = Matakuliah::findOrFail($id);
        $mk->kode = $request->kode;
        $mk->nama_matakuliah = $request->nama_matakuliah;
        $mk->save();

        return redirect('/matakuliah')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Matakuliah::destroy($id);
        return redirect('/matakuliah')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}

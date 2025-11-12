<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $matakuliah = Matakuliah::all();
        $mahasiswa = Mahasiswa::all();

        $matakuliah_id = $request->matakuliah_id;
        $tanggal = $request->tanggal_absensi ?? now()->toDateString();

        $absensi = [];
        if ($matakuliah_id) {
            $absensi = Absensi::where('matakuliah_id', $matakuliah_id)
                ->whereDate('tanggal_absensi', $tanggal)
                ->get()
                ->keyBy('mahasiswa_id');
    }
    
        return view('IndexAbsensi', compact('matakuliah', 'mahasiswa', 'absensi', 'matakuliah_id', 'tanggal'));
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
       $tanggal = $request->tanggal_absensi;
       $matakuliah_id = $request->matakuliah_id;

       foreach ($request->status_absen as $mahasiswa_id => $status) {
           Absensi::updateOrCreate(
               [
                   'mahasiswa_id' => $mahasiswa_id,
                   'matakuliah_id' => $matakuliah_id,
                   'tanggal_absensi' => $tanggal,
               ],
               [
                   'status_absen' => $status,
               ]
           );
       }
       return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan.');
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
}

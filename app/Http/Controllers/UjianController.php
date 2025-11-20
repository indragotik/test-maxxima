<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Peserta;
use App\Models\Siswa;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = $data = DB::table('ujians as u')
                ->select(
                    'u.id',
                    'u.nama_ujian',
                    'u.id_mata_pelajaran',
                    'mp.mata_pelajaran',
                    'u.tanggal',
                    'p.peserta',
                    's.nama',
                    'u.status',
                    DB::raw('(SELECT COUNT(*) FROM pesertas pt WHERE pt.id_ujian = u.id) AS jumlah')
                )
                ->leftJoin('mata_pelajarans as mp', 'u.id_mata_pelajaran', '=', 'mp.id')
                ->join('pesertas as p', 'p.id_ujian', '=', 'u.id')
                ->leftJoin('siswas as s', 's.nis', '=', 'p.peserta')
                ->get();

        return view('ujian.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mataPelarajan = MataPelajaran::get();
        return view('ujian.create', [
            'mataPelajaran' => $mataPelarajan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ujian' => 'required',
            'id_mata_pelajaran' => 'required',
            'tanggal' => 'required',
            'nilai' => 'required',
        ]);

        Ujian::create([
            'nama_ujian' => $request->nama_ujian,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'tanggal' => $request->tanggal,
            'status' => 1,
        ]);

        return redirect()->route('ujian.index')
            ->with('success','Ujian created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('ujians as u')
                ->leftJoin('mata_pelajarans as mp', 'mp.id', '=', 'u.id_mata_pelajaran')
                ->join('pesertas as p', 'p.id_ujian' , '=', 'u.id')
                ->select('u.id', 'u.nama_ujian', 'u.id_mata_pelajaran', 'mp.mata_pelajaran', 'u.tanggal')
                ->where('u.id', $id)
                ->first();
        return view('ujian.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('ujians as u')
                ->leftJoin('mata_pelajarans as mp', 'mp.id', '=', 'u.id_mata_pelajaran')
                ->join('pesertas as p', 'p.id_ujian' , '=', 'u.id')
                ->select('u.id', 'u.nama_ujian', 'u.id_mata_pelajaran', 'mp.mata_pelajaran', 'u.tanggal')
                ->where('u.id', $id)
                ->first();

        $mataPelarajan = MataPelajaran::get();
        $siswa = Siswa::get();
        return view('ujian.edit', [
            'mataPelajaran' => $mataPelarajan,
            'siswa' => $siswa,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

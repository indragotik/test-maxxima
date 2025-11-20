<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Peserta;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = DB::table('pesertas as p')
                ->select(
                    'p.id',
                    'p.id_ujian',
                    'u.nama_ujian',
                    'mp.mata_pelajaran',
                    'p.peserta',
                    's.nama',
                    'p.status',
                    'p.nilai'
                )
                ->join('ujians as u', 'p.id_ujian', '=', 'u.id')
                ->leftJoin('siswas as s', 's.nis', '=', 'p.peserta')
                ->leftJoin('mata_pelajarans as mp', 'u.id_mata_pelajaran', '=', 'mp.id')
                ->get();
        return view('peserta.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mataPelarajan = MataPelajaran::get();
        $siswa = Siswa::get();
        return view('ujian.create', [
            'mataPelajaran' => $mataPelarajan,
            'siswa' => $siswa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_ujian' => 'required',
            'peserta' => 'required',
            'nilai' => 'required',
        ]);

        $status = 0;
        if($request->nilai >= 75){
            $status = 1;
        } else if($request->nilai < 75){
            $status = 2;
        }

        Peserta::create([
            'id_ujian' => $request->id_ujian,
            'peserta' => $request->peserta,
            'status' => $status,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('peserta.index')
            ->with('success','Peserta created successfully.');
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

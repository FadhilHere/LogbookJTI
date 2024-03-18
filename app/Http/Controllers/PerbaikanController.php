<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $labFilter = $request->input('labFilter');
        $kelasFilter = $request->input('kelasFilter');


        $query = DB::table('logkuliah')
            ->join('lab', 'logkuliah.id_lab', '=', 'lab.id_lab')
            ->join('kelas', 'logkuliah.kelas', '=', 'kelas.id_kelas')
            ->join('matakuliah', 'logkuliah.matkul', '=', 'matakuliah.id_matakuliah')
            ->select('logkuliah.*', 'lab.ruang_lab', 'kelas.nama_kelas', 'matakuliah.matkul')
            ->whereNull('logkuliah.SKS')
            ->where('logkuliah.status', '=', 'Belum Selesai')
            ->orderBy('logkuliah.id_logkul', 'desc');

        if ($labFilter && $labFilter !== 'semua_lab') {
            $query->where('lab.ruang_lab', $labFilter);
        }


        if ($kelasFilter) {
            $query->where('kelas.nama_kelas', $kelasFilter);
        }

        $data = $query->get();


        $listRuangLab = DB::table('lab')->distinct()->pluck('ruang_lab');


        $listKelas = DB::table('kelas')->distinct()->pluck('nama_kelas');

        return view('superadmin.perbaikan', compact('data', 'listRuangLab', 'listKelas', 'labFilter', 'kelasFilter'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function historyPerbaikan(Request $request)
    {
        $labFilter = $request->input('labFilter');
        $kelasFilter = $request->input('kelasFilter');

        $query = DB::table('history_perbaikan')
            ->join('lab', 'history_perbaikan.lab', '=', 'lab.id_lab')
            ->join('kelas', 'history_perbaikan.kelas', '=', 'kelas.id_kelas')
            ->select('history_perbaikan.*', 'lab.ruang_lab', 'kelas.nama_kelas')
            ->orderBy('history_perbaikan.id', 'desc');

        if ($labFilter && $labFilter !== 'semua_lab') {
            $query->where('lab.ruang_lab', $labFilter);
        }
        if ($kelasFilter && $labFilter !== 'semua_lab') {
            $query->where('kelas.nama_kelas', $kelasFilter);
        }

        $data = $query->get();

        // Ambil seluruh data ruang lab untuk filter
        $listRuangLab = DB::table('lab')->distinct()->pluck('ruang_lab');

        // Ambil seluruh data kelas untuk filter
        $listKelas = DB::table('kelas')->distinct()->pluck('nama_kelas');

        return view('superadmin.historyPerbaikan', compact('data', 'listRuangLab', 'listKelas', 'labFilter', 'kelasFilter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logkuliahId = $request->input('logkuliah_id');
        $keterangan = $request->input('keterangan');


        $logkuliahData = DB::table('logkuliah')->where('id_logkul', $logkuliahId)->first();

        DB::table('history_perbaikan')->insert([
            'lab' => $logkuliahData->id_lab,
            'nama' => $logkuliahData->nama,
            'nim' => $logkuliahData->nim,
            'kelas' => $logkuliahData->kelas,
            'pc' => $logkuliahData->pc,
            'tanggalMasuk' => $logkuliahData->tanggal,
            'tanggal' => now(),
            'jamMasuk' => $logkuliahData->jamMasuk,
            'monitor' => $logkuliahData->monitor,
            'keyboard' => $logkuliahData->keyboard,
            'mouse' => $logkuliahData->mouse,
            'jaringan' => $logkuliahData->jaringan,

            'keterangan' => $keterangan,
        ]);

        DB::table('logkuliah')->where('id_logkul', $logkuliahId)->update(['status' => 'Selesai']);

        return redirect()->route('perbaikan.index')->with('success', 'Data Perbaikan berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('history_perbaikan')->where('id', $id)->delete();

        return redirect()->route('historyPerbaikan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

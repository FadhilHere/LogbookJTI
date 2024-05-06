<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $labs = DB::table('lab')->get();
        $labFilter = $request->input('labFilter');

        $query = DB::table('history_peminjaman')
            ->join('lab', 'history_peminjaman.lab', '=', 'lab.id_lab')
            ->select('history_peminjaman.*', 'lab.ruang_lab')
            ->orderBy('history_peminjaman.id_peminjaman', 'desc');

        if ($labFilter && $labFilter !== 'semua_lab') {
            $query->where('lab.ruang_lab', $labFilter);
        }

        // Eksekusi query untuk mengambil data
        $peminjamanLab = $query->get();

        $listRuangLab = DB::table('lab')->distinct()->pluck('ruang_lab');

        // Tampilkan view superadmin.peminjamanLab dan kirimkan data peminjamanLab
        return view('superadmin.peminjamanLab', compact('peminjamanLab', 'listRuangLab', 'labs'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lab' => 'required',
            'peminjam' => 'required',
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date|after_or_equal:tanggalMulai',
            'jamMulai' => 'required',
            'jamSelesai' => 'required',
            'kegiatan' => 'required',
            'keterangan' => 'nullable',
        ]);
        // Ambil waktu sekarang
        $now = Carbon::now();
        // Ambil data dari request
        $lab = $request->input('lab');
        $peminjam = $request->input('peminjam');
        $tanggalMulai = $request->input('tanggalMulai');
        $tanggalSelesai = $request->input('tanggalSelesai');
        $jamMulai = $request->input('jamMulai');
        $jamSelesai = $request->input('jamSelesai');
        $kegiatan = $request->input('kegiatan');
        $keterangan = $request->input('keterangan');
        // Tentukan status berdasarkan waktu sekarang
        if ($now->lt(Carbon::parse($tanggalMulai))) {
            $status = 'Dijadwalkan';
        } elseif (
            $now->gt(Carbon::parse($tanggalMulai)) &&
            $now->between(Carbon::parse($jamMulai), Carbon::parse($jamSelesai))
        ) {
            $status = 'On Progress';
        } elseif ($now->gt(Carbon::parse($tanggalSelesai)) && $now->gt(Carbon::parse($jamSelesai))) {
            $status = 'Selesai';
        } else {
            $status = 'Dijadwalkan'; // Default status
        }
        // Simpan data ke database
        DB::table('history_peminjaman')->insert([
            'lab' => $lab,
            'peminjam' => $peminjam,
            'tanggalMulai' => $tanggalMulai,
            'tanggalSelesai' => $tanggalSelesai,
            'jamMulai' => $jamMulai,
            'jamSelesai' => $jamSelesai,
            'kegiatan' => $kegiatan,
            'status' => $status,
            'keterangan' => $keterangan,
        ]);
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil disimpan.');
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
        $request->validate([
            'labEdit' => 'required',
            'peminjamEdit' => 'required',
            'tanggalMulaiEdit' => 'required|date',
            'tanggalSelesaiEdit' => 'required|date|after_or_equal:tanggalMulaiEdit',
            'jamMulaiEdit' => 'required',
            'jamSelesaiEdit' => 'required',
            'kegiatanEdit' => 'required',
            'keteranganEdit' => 'nullable',
            'statusEdit' => 'required|in:Dijadwalkan,On Progress,Selesai',
        ]);

        // Ambil waktu sekarang
        $now = Carbon::now();

        // Ambil data dari request
        $lab = $request->input('labEdit');
        $peminjam = $request->input('peminjamEdit');
        $tanggalMulai = $request->input('tanggalMulaiEdit');
        $tanggalSelesai = $request->input('tanggalSelesaiEdit');
        $jamMulai = $request->input('jamMulaiEdit');
        $jamSelesai = $request->input('jamSelesaiEdit');
        $kegiatan = $request->input('kegiatanEdit');
        $keterangan = $request->input('keteranganEdit');
        $status = $request->input('statusEdit');



        DB::table('history_peminjaman')->where('id_peminjaman', $id)->update([
            'lab' => $lab,
            'peminjam' => $peminjam,
            'tanggalMulai' => $tanggalMulai,
            'tanggalSelesai' => $tanggalSelesai,
            'jamMulai' => $jamMulai,
            'jamSelesai' => $jamSelesai,
            'kegiatan' => $kegiatan,
            'status' => $status,
            'keterangan' => $keterangan,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('history_peminjaman')->where('id_peminjaman', $id)->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil dihapus');
    }
}

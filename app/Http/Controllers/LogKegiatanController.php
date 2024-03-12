<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class LogKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function index(Request $request)
		    {
			            $labFilter = $request->input('labFilter');

				            $query = DB::table('logkegiatan')
						                ->join('lab', 'logkegiatan.id_lab', '=', 'lab.id_lab')
							            ->select('logkegiatan.*', 'lab.ruang_lab')
							                ->whereNull('logkegiatan.peserta')
								            ->orderBy('logkegiatan.id_logke', 'desc');

				            if ($labFilter && $labFilter !== 'semua_lab') {
						                $query->where('lab.ruang_lab', $labFilter);
								        }

				            $data = $query->get();

				            $dataPICQuery = DB::table('logkegiatan')
						                ->join('lab', 'logkegiatan.id_lab', '=', 'lab.id_lab')
							            ->select('logkegiatan.*', 'lab.ruang_lab')
							                ->whereNotNull('logkegiatan.peserta');

					            if ($labFilter && $labFilter !== 'semua_lab') {
							                $dataPICQuery->where('lab.ruang_lab', $labFilter);
									        }

					            $dataPIC = $dataPICQuery->get();

					            $listRuangLab = DB::table('lab')->distinct()->pluck('ruang_lab');

						            return view('superadmin.kegiatan', compact('data', 'dataPIC', 'labFilter', 'listRuangLab'));
						        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pcs = DB::table('pc')
        //     ->orderBy('nomor_pc', 'asc')
        //     ->get();
        $labs = DB::table('lab')->get();
        return view('kegiatan', compact('labs'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'nullable',
            'kelas' => 'nullable',
            'pc' => 'required',
            'lab' => 'required',
            'jamMasuk' => 'required',
            'jamKeluar' => 'required',
            'tanggal' => 'required',
            'monitor' => 'required',
            'keyboard' => 'required',
            'mouse' => 'required',
            'jaringan' => 'required',
            'keterangan' => 'nullable',
            'alat' => 'nullable',
        ]);
        $jamMasuk = Carbon::parse($request->input('jamMasuk'))->format('H:i:s');
        $jamKeluar = Carbon::parse($request->input('jamKeluar'))->format('H:i:s');

        DB::table('logkegiatan')->insert([
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'kelas' => $request->input('kelas'),
            'pc' => $request->input('pc'),
            'id_lab' => $request->input('lab'),
            'jamMasuk' => $jamMasuk,
            'jamKeluar' => $jamKeluar,
            'tanggal' => $request->input('tanggal'),
            'monitor' => $request->input('monitor'),
            'keyboard' => $request->input('keyboard'),
            'mouse' => $request->input('mouse'),
            'jaringan' => $request->input('jaringan'),
            'keterangan' => $request->input('keterangan'),
            'alat' => $request->input('alat'),
        ]);
        return redirect('/')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function storePIC(Request $request)
    {
        $this->validate($request, [
            'lab' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'nohp' => 'required',
            'email' => 'required|email',
            'kegiatan' => 'required',
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date|after_or_equal:tanggalMulai',
            'jamMasuk' => 'required',
            'jamKeluar' => 'required',
            'peserta' => 'required',
            'keterangan' => 'nullable',
            'alat' => 'nullable',
        ]);

        $tanggalMulai = Carbon::parse($request->input('tanggalMulai'))->format('Y-m-d');
        $tanggalSelesai = Carbon::parse($request->input('tanggalSelesai'))->format('Y-m-d');
        $totalHari = Carbon::parse($tanggalSelesai)->diffInDays(Carbon::parse($tanggalMulai));

        $jamMasuk = Carbon::parse($request->input('jamMasuk'))->format('H:i:s');
        $jamKeluar = Carbon::parse($request->input('jamKeluar'))->format('H:i:s');

        DB::table('logkegiatan')->insert([
            'id_lab' => $request->input('lab'),
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'nohp' => $request->input('nohp'),
            'email' => $request->input('email'),
            'kegiatan' => $request->input('kegiatan'),
            'tanggalMulai' => $tanggalMulai,
            'tanggalSelesai' => $tanggalSelesai,
            'totalHari' => $totalHari,
            'jamMasuk' => $jamMasuk,
            'jamKeluar' => $jamKeluar,
            'peserta' => $request->input('peserta'),
            'keterangan' => $request->input('keterangan'),
            'alat' => $request->input('alat'),
        ]);

        return redirect('/')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $data = DB::table('logkegiatan')->where('id_logke', $id)->first();
        return view('superadmin.edit', compact('data'));
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
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'jamMasuk' => 'required',
            'jamKeluar' => 'required',
            'monitor' => 'required',
            'keyboard' => 'required',
            'mouse' => 'required',
            'jaringan' => 'required',
            'keterangan' => '',
            'alat' => '',
        ]);

        DB::update(
            "UPDATE logkegiatan SET  `nama`=?, `nim`=?, `kelas`=?, `jamMasuk`=?, `jamKeluar`=?, `monitor`=?, `keyboard`=?, `mouse`=?, `jaringan`=?, `keterangan`=?, `alat`=? WHERE id_logke=?",
            [
                $request->nama,
                $request->nim,
                $request->kelas,
                $request->jamMasuk,
                $request->jamKeluar,
                $request->monitor,
                $request->keyboard,
                $request->mouse,
                $request->jaringan,
                $request->keterangan,
                $request->alat,
                $id
            ]
        );
        return redirect()->route('superadmin.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('logkegiatan')->where('id_logke', $id)->delete();

        //redirect to index
        return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

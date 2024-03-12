<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class LogDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Jika level pengguna adalah 'admin', ambil data lab sesuai dengan username
        $username = session('username');

        $currentDateTime = now();

        $data = DB::table('logkuliah')

            ->join('lab', 'logkuliah.id_lab', '=', 'lab.id_lab')
	    ->join('matakuliah', 'logkuliah.matkul', '=', 'matakuliah.id_matakuliah')
    		->join('kelas', 'logkuliah.kelas', '=', 'kelas.id_kelas')
            ->select('logkuliah.*', 'lab.ruang_lab', 'matakuliah.matkul',  'kelas.nama_kelas')
            ->where(function ($query) use ($username) {
                $query->where('logkuliah.dosen', $username)->orWhere('logkuliah.ail', $username);
            })
            ->whereNull('logkuliah.SKS')
            ->whereDate('logkuliah.tanggal', $currentDateTime->format('Y-m-d'))
            ->whereTime('logkuliah.jamMasuk', '<=', $currentDateTime->format('H:i:s'))
            ->whereTime('logkuliah.jamKeluar', '>=', $currentDateTime->format('H:i:s'))
            ->orderBy('id_logkul', 'desc')
            ->get();

        return view('Admin.kuliah', compact('data'));
    }

    public function getKelasList($labId)
	        {
			        
			        $kelasList = DB::table('matakuliah')
					            ->where('id_lab', $labId)
					                ->distinct()
						            ->pluck('kelas'); 

				        
				        $kelasListData = DB::table('kelas')
						            ->whereIn('id_kelas', $kelasList)
						                ->get();

				        return response()->json($kelasListData);
				    }

    public function getMatkulList($idLab, $kelasId)
    {
        $currentDate = Carbon::now();

        $matakuliahs = DB::table('matakuliah')
		->where('id_lab', $idLab)
	->where('kelas', $kelasId)
            ->where(function ($query) use ($currentDate) {
                $query->whereDate('tanggal', '<=', $currentDate)
                    ->WhereDate('tanggalSelesai', '>=', $currentDate);
            })
            ->get();

        return $matakuliahs;
    }

    public function getMatkulList1($idLab)
	        {
			        $currentDate = Carbon::now();

				        $matakuliahs = DB::table('matakuliah')
						            ->where('id_lab', $idLab)
						                ->where(function ($query) use ($currentDate) {
									                $query->whereDate('tanggal', '<=', $currentDate)
												                    ->whereDate('tanggalSelesai', '>=', $currentDate);
											            })
												                ->get();

				        return $matakuliahs;
				    }



    public function getMatkulInfo($idLab, $idMatkul)
    {
        // Ambil informasi jamMasuk, jamKeluar, dan sks berdasarkan $idMatkul
        $matkulInfo = DB::table('matakuliah')
            ->where('id_lab', $idLab)
            ->where('id_matakuliah', $idMatkul)
            ->first();

        return response()->json($matkulInfo);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('Admin.isiLog');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 public function create()
	     {

	        $labs = DB::table('lab')->get();
           $kelas = DB::table('kelas')->get();

        $idLab = request('lab') ?? $labs->first()->id_lab;
        $kelasId = request('kelas') ?? $kelas->first()->id_kelas;


        $matakuliahs = $this->getMatkulList($idLab, $kelasId);


        $firstMatkul = $matakuliahs->first();
        $matkulInfo = $firstMatkul ? $this->getMatkulInfo($idLab, $firstMatkul->id_matakuliah) : null;

        return view('Admin.isiLog', compact('labs', 'matakuliahs', 'matkulInfo', 'kelas'));
    }	
	

    public function store(Request $request)
    {
        $currentUser = Auth::user();

        $id_lab = $request->input('lab');
        $nama = $request->input('nama');
        $jamMasuk = $request->input('jamMasuk');
        $jamKeluar = $request->input('jamKeluar');
        $keterangan = $request->input('keterangan');
        $hadir = $request->input('hadir');
        $tidakhadir = $request->input('tidakhadir');
        $sks = $request->input('sks');
        $matkul = $request->input('matkul');
        $tanggal = $request->input('tanggal');
	$kelas = $request->input('kelas');
        $jumlahMhs = $hadir + $tidakhadir;

        $durasi = Carbon::parse($jamKeluar)->diffInMinutes(Carbon::parse($jamMasuk));

        DB::table('logkuliah')->insert([
            'id_lab' => $id_lab,
            'nama' => $nama,
            'jamMasuk' => $jamMasuk,
            'jamKeluar' => $jamKeluar,
            'keterangan' => $keterangan,
            'hadir' => $hadir,
            'tidakhadir' => $tidakhadir,
            'sks' => $sks,
            'matkul' => $matkul,
	    'tanggal' => $tanggal,
	    'kelas' => $kelas,
            'jumlahMhs' => $jumlahMhs,
            'durasi' => $durasi,
            'jabatan' => $currentUser->level,
        ]);

        return redirect()->route('admin.index')->with(['success' => 'Data Logbook Berhasil Disimpan!']);
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
        $data = DB::table('logkuliah')->where('id_logkul', $id)->first();
        return view('logkuliah.edit', compact('data'));
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
            'lab' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'dosen' => 'required',
            'matkul' => 'required',
            'pc' => 'required',
            'jamMasuk' => 'required',
            'jamKeluar' => 'required',
            'monitor' => 'required',
            'keyboard' => 'required',
            'mouse' => 'required',
            'jaringan' => 'required',
            'keterangan' => 'required',
            'alat' => 'required',
        ]);


        DB::update(
            "UPDATE logkuliah SET   `lab`=?,`nama`=?, `nim`=?, `kelas`=?, `dosen`=?, `matkul`=?, `pc`=?, `jamMasuk`=?, `jamKeluar`=?, `monitor`=?, `keyboard`=?, `mouse`=?, `jaringan`=?, `keterangan`=?, `alat`=? WHERE id_logkul=?",
            [
                $request->lab,
                $request->nama,
                $request->nim,
                $request->kelas,
                $request->dosen,
                $request->matkul,
                $request->pc,
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
        return redirect()->route('logkuliah.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('logkuliah')->where('id_logkul', $id)->delete();

        return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

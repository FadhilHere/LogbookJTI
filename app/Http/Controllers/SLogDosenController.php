<?php

namespace App\Http\Controllers;

use App\Exports\ExportDosen;
use App\Exports\ExportDosenMinggu;
use App\Exports\ExportKuliahMinggu;
use App\Exports\ExportKuliahBulan;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class SLogDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listRuangLab = DB::table('lab')->pluck('ruang_lab'); // Ambil daftar ruang lab untuk dropdown

        $query = DB::table('logkuliah')
            ->join('lab', 'logkuliah.id_lab', '=', 'lab.id_lab')
	    ->join('matakuliah', 'logkuliah.matkul', '=', 'matakuliah.id_matakuliah')
    		->join('kelas', 'logkuliah.kelas', '=', 'kelas.id_kelas')
            ->select('logkuliah.*', 'lab.ruang_lab', 'matakuliah.matkul', 'kelas.nama_kelas')
            ->whereNotNull('logkuliah.SKS');

        // Filter berdasarkan ruang lab jika terdapat nilai pada labFilter
        if ($request->has('labFilter') && $request->input('labFilter') !== 'semua_lab') {
            $query->where('lab.ruang_lab', $request->input('labFilter'));
        }

        $data = $query->orderBy('id_logkul', 'desc')->get();

        return view('superadmin.logdosen', compact('data', 'listRuangLab'));
    }


    public function export_excel()
    {
        return Excel::download(new ExportDosen, "logbook.xlsx");
    }
    public function excelDosenMingguan()
    {
        return Excel::download(new ExportDosenMinggu, "log dosen mingguan.xlsx");
    }
    public function excelKuliahMingguan()
    {
        return Excel::download(new ExportKuliahMinggu, "log kuliah mingguan.xlsx");
    }
    public function excelKuliahBulanan()
    {
        return Excel::download(new ExportKuliahBulan, "log kuliah bulanan.xlsx");
    }
    public function excelKegiatanMingguan()
    {
        return Excel::download(new ExportKeig, "log kuliah bulanan.xlsx");
    }
    public function excelKegiatanBulanan()
    {
        return Excel::download(new ExportKuliahBulan, "log kuliah bulanan.xlsx");
    }
    public function getDataByLabAndKelas($labFilter, $kelasFilter)
    {
        $query = DB::table('logkuliah')
            ->join('lab', 'logkuliah.id_lab', '=', 'lab.id_lab')
            ->select('logkuliah.*', 'lab.ruang_lab')
            ->whereNull('SKS');

        if ($labFilter !== 'semua_lab') {
            $query->where('lab.ruang_lab', $labFilter);
        }

        if ($kelasFilter !== 'semua_kelas') {
            $query->where('logkuliah.kelas', $kelasFilter);
        }

        return $query->orderBy('id_logkul', 'desc')->get();
    }


    // public function kuliah(Request $request)
    // {
    //     $labFilter = $request->input('labFilter');
    //     $kelasFilter = $request->input('kelasFilter');

    //     $query = DB::table('logkuliah')
    //         ->join('lab', 'logkuliah.id_lab', '=', 'lab.id_lab')
    //         ->join('kelas', 'logkuliah.kelas', '=', 'kelas.id_kelas')
    //         ->select('logkuliah.*', 'lab.ruang_lab', 'kelas.nama_kelas')
    //         ->whereNull('SKS');

    //     if ($request->has('labFilter')) {
    //         if ($labFilter !== 'semua_lab') {
    //             $query->where('lab.ruang_lab', $labFilter);
    //         }
    //         // Jika $labFilter === 'semua_lab', maka tidak perlu menambahkan kondisi apa pun.
    //     }

    //     if ($request->has('kelasFilter')) {
    //         if ($kelasFilter !== 'semua_kelas') {
    //             $query->where('logkuliah.kelas', $kelasFilter);
    //         }
    //         // Jika $kelasFilter === 'semua_kelas', maka tidak perlu menambahkan kondisi apa pun.
    //     }

    //     $data = $query->orderBy('id_logkul', 'desc')->get();
    //     $listRuangLab = DB::table('lab')->distinct()->pluck('ruang_lab');
    //     $listKelas = DB::table('logkuliah')->distinct()->pluck('kelas');

    //     return view('superadmin.kuliah', compact('data', 'listRuangLab', 'listKelas'));
    // }
    public function kuliah(Request $request)
    {
        $labFilter = $request->input('labFilter');
        $kelasFilter = $request->input('kelasFilter');


        $query = DB::table('logkuliah')
            ->join('lab', 'logkuliah.id_lab', '=', 'lab.id_lab')
            ->join('kelas', 'logkuliah.kelas', '=', 'kelas.id_kelas')
            ->join('matakuliah', 'logkuliah.matkul', '=', 'matakuliah.id_matakuliah')
            ->select('logkuliah.*', 'lab.ruang_lab', 'kelas.nama_kelas', 'matakuliah.matkul')
            ->whereNull('logkuliah.SKS')
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

        return view('superadmin.kuliah', compact('data', 'listRuangLab', 'listKelas', 'labFilter', 'kelasFilter'));
    }



    public function dashboard()
    {
        // $currentYear = 2023;

        $currentYear = date('Y');

        $logbookData = DB::table('logkuliah')
            ->select(DB::raw('MONTH(tanggal) as month'), DB::raw('COUNT(*) as count'))
            ->whereYear('tanggal', '=', $currentYear)
            ->groupBy('month')
            ->get();

        $logbookDataKegiatan = DB::table('logkegiatan')
            ->select(DB::raw('MONTH(tanggalMulai) as month'), DB::raw('COUNT(*) as count'))
            ->whereYear('tanggalMulai', '=', $currentYear)
            ->groupBy('month')
            ->get();

        $pieChartDataKuliah = [
            DB::table('logkuliah')->where('Monitor', 'rusak')->count(),
            DB::table('logkuliah')->where('Keyboard', 'rusak')->count(),
            DB::table('logkuliah')->where('Mouse', 'rusak')->count(),
            DB::table('logkuliah')->where('Jaringan', 'rusak')->count(),
        ];

        $pieChartDataKegiatan = [
            DB::table('logkegiatan')->where('Monitor', 'rusak')->count(),
            DB::table('logkegiatan')->where('Keyboard', 'rusak')->count(),
            DB::table('logkegiatan')->where('Mouse', 'rusak')->count(),
            DB::table('logkegiatan')->where('Jaringan', 'rusak')->count(),
        ];

        // Mengambil total user dari tabel users
        $totalUsers = DB::table('users')->count();

        // Mengambil total lab dari tabel lab
        $totalLab = DB::table('lab')->count();

        $totalPC = DB::table('kelas')->count();



        // Mengirimkan data total user, total lab, dan total pc ke view
        return view('superadmin.dashboard', compact('totalUsers', 'totalLab', 'totalPC', 'logbookData', 'logbookDataKegiatan', 'pieChartDataKuliah', 'pieChartDataKegiatan'));
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
        $pcs = DB::table('pc')->get();
        $labs = DB::table('lab')->get();

        return view('Admin.isiLog', compact('pcs', 'labs'));
    }

    public function store(Request $request)
    {
        // Validasi dan penyimpanan data logbook
        // Pastikan Anda menyesuaikan validasi sesuai dengan kebutuhan

        $id_lab = $request->input('lab');
        $nama = $request->input('nama');
        $jamMasuk = $request->input('jamMasuk');
        $jamKeluar = $request->input('jamKeluar');
        $keterangan = $request->input('keterangan');
        $hadir = $request->input('hadir');
        $tidakhadir = $request->input('tidakhadir');
        $sks = $request->input('sks');
        $tanggal = $request->input('tanggal');

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
            'tanggal' => $tanggal,
            'jumlahMhs' => $jumlahMhs,
            'durasi' => $durasi,
            // Tambahkan kolom lain sesuai kebutuhan
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

        return redirect()->route('kuliahDosen.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function destroyMhs($id)
    {
        DB::table('logkuliah')->where('id_logkul', $id)->delete();

        return redirect()->route('kuliahDosen.kuliah')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

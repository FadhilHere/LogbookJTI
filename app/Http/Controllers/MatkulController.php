<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listRuangLab = DB::table('lab')->pluck('ruang_lab');
        $datalab = DB::select(DB::raw("SELECT * FROM lab"));
        $kelas = DB::table('kelas')->get();
        $labFilter = $request->input('labFilter');
        $semesterFilter = $request->input('semesterFilter');
        $now = now();
        $nowYear = $now->year;

        $query = DB::table('matakuliah')
            ->join('lab', 'matakuliah.id_lab', '=', 'lab.id_lab')
            ->join('kelas', 'matakuliah.kelas', '=', 'kelas.id_kelas')
            ->select('matakuliah.*', 'lab.ruang_lab', 'kelas.*');

        // Filter berdasarkan ruang lab jika terdapat nilai pada labFilter
        if ($labFilter && $labFilter !== 'semua_lab') {
            $query->where('lab.ruang_lab', $labFilter);
        }

        if ($semesterFilter && $semesterFilter !== 'semua_semester') {
            $query->where('matakuliah.semester', $semesterFilter);
        }

        // Filter berdasarkan tanggal dan tanggalSelesai dalam tahun yang sama dengan sekarang
        $query->where(function ($query) use ($nowYear) {
            $query->whereYear('matakuliah.tanggal', $nowYear)
                ->orWhereYear('matakuliah.tanggalSelesai', $nowYear);
        });

        $matakuliahs = $query->orderBy('id_matakuliah', 'desc')->get();

        return view('superadmin.matkul', compact('matakuliahs', 'listRuangLab', 'datalab', 'labFilter', 'semesterFilter', 'kelas'));
    }


    public function historyMatkul(Request $request)
    {
        $listRuangLab = DB::table('lab')->pluck('ruang_lab'); // Ambil daftar ruang lab untuk dropdown
        $datalab = DB::select(DB::raw("SELECT * FROM lab"));

        $labFilter = $request->input('labFilter');
        $semesterFilter = $request->input('semesterFilter');
        $tahunFilter = $request->input('tahunFilter');

        $now = now();
        $nowYear = $now->year;
        $nowMonth = $now->month;
        $nowDate = $now->toDateString();


        $query = DB::table('matakuliah')
            ->join('lab', 'matakuliah.id_lab', '=', 'lab.id_lab')
            ->select('matakuliah.*', 'lab.ruang_lab');

        // Filter berdasarkan ruang lab jika terdapat nilai pada labFilter
        if ($labFilter && $labFilter !== 'semua_lab') {
            $query->where('lab.ruang_lab', $labFilter);
        }

        // Filter berdasarkan semester jika terdapat nilai pada semesterFilter
        if ($semesterFilter && $semesterFilter !== 'semua_semester') {
            $query->where('matakuliah.semester', $semesterFilter);
        }

        // Filter berdasarkan tahun jika terdapat nilai pada tahunFilter
        if ($tahunFilter && $tahunFilter !== 'semua_tahun') {
            $query->whereYear('matakuliah.tanggal', $tahunFilter);
        }

        // Filter berdasarkan tanggal dan tanggalSelesai dalam tahun yang sama dengan sekarang
        $query->where(function ($query) use ($nowYear, $nowMonth, $nowDate) {
            $query->whereYear('matakuliah.tanggal', '!=', $nowYear)
                ->orWhere(function ($query) use ($nowYear, $nowMonth) {
                    $query->whereYear('matakuliah.tanggal', '=', $nowYear)
                        ->whereMonth('matakuliah.tanggalSelesai', '<', $nowMonth);
                })
                ->orWhere('matakuliah.tanggalSelesai', '<', $nowDate);
        });

        $matakuliahs = $query->orderBy('id_matakuliah', 'desc')->get();

        // Ambil daftar tahun untuk dropdown
        $tahunOptions = DB::table('matakuliah')->distinct()->pluck(DB::raw('YEAR(tanggal) as year'))->toArray();

        return view('superadmin.historyMatkul', compact('matakuliahs', 'listRuangLab', 'datalab', 'tahunOptions', 'labFilter', 'semesterFilter', 'tahunFilter'));
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labs = DB::table('lab')->get();
        return view('superadmin.matkul', compact('labs'));
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
            'id_lab' => 'required',
            'jamMasuk' => 'required',
            'jamKeluar' => 'required',
            'sks' => 'required',
            'matkul' => 'required',
            'kelas' => 'required',
            'dosen' => 'required',
            'ail' => 'required',
            'tanggal' => 'required|date',
            'tanggalSelesai' => 'required|date',
            'hari' => 'required',
        ]);


        $tanggalSelesai = $request->tanggalSelesai;


        $tanggal = $request->tanggal;


        $semester = $this->hitungSemester($tanggal);

        DB::table('matakuliah')->insert([
            'id_lab' => $request->id_lab,
            'jamMasuk' => $request->jamMasuk,
            'jamKeluar' => $request->jamKeluar,
            'sks' => $request->sks,
            'matkul' => $request->matkul,
            'kelas' => $request->kelas,
            'dosen' => $request->dosen,
            'ail' => $request->ail,
            'tanggal' => $tanggal,
            'tanggalSelesai' => $tanggalSelesai,
            'semester' => $semester,
            'hari' => $request->hari,
        ]);

        return redirect()->route('matkul.index')->with('success', 'Matakuliah berhasil ditambahkan');


    }
    private function hitungTanggalSelesai($tanggalSelesai, $semester)
    {
        $tahunSelesai = Carbon::parse($tanggalSelesai)->addYear()->year;

        if ($semester == 'ganjil') {
            // Jika ganjil, set tanggalSelesai menjadi 24 Februari tahun depan
            return Carbon::create($tahunSelesai, 2, 24)->toDateString();
        } else {
            // Jika genap, set tanggalSelesai menjadi 24 Agustus tahun depan
            return Carbon::create($tahunSelesai, 8, 24)->toDateString();
        }
    }
    private function hitungTanggal($inputTanggal, $semester)
    {
        // Hitung nilai tanggal berdasarkan semester
        if ($semester == 'ganjil') {
            // Set tanggal ke 5 September
            return date('Y-m-d', strtotime(date('Y') . '-09-05'));
        } else {
            // Set tanggal ke 5 Maret
            return date('Y-m-d', strtotime(date('Y') . '-03-05'));
        }
    }

    private function hitungStatus($tanggal)
    {
        // Konversi tanggal ke objek Carbon
        $tanggalCarbon = Carbon::parse($tanggal);

        // Tentukan rentang waktu untuk semester ganjil dan genap
        $mulai1 = Carbon::create(null, 9, 1); // 1 September
        $akhir1 = Carbon::create(null, 2, 24); // 24 Februari
        $mulai2 = Carbon::create(null, 3, 1); // 1 Maret
        $akhir2 = Carbon::create(null, 8, 24); // 24 Agustus

        // Periksa apakah tanggal berada dalam rentang yang ditentukan
        if ($tanggalCarbon->between($mulai1, $akhir1) || $tanggalCarbon->between($mulai2, $akhir2)) {
            return 'non-aktif'; // Set status ke 'aktif'
        } else {
            return 'aktif'; // Set status ke 'non-aktif'
        }
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
        $matakuliah = DB::table('matakuliah')->where('id_matakuliah', $id)->first();
        $labs = DB::table('lab')->get();
        return view('superadmin.matkul', compact('matakuliah', 'labs'));
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
            'id_lab' => 'required',
            'jamMasuk' => 'required',
            'jamKeluar' => 'required',
            'sks' => 'required',
            'matkul' => 'required',
            'kelas' => 'required',
            'dosen' => 'required',
            'ail' => 'required',
            'tanggal' => 'required|date',
            'tanggalSelesai' => 'required|date',
            'hari' => 'required',

        ]);

        $tanggalSelesai = $request->tanggalSelesai;
        $tanggal = $request->tanggal;
        $semester = $this->hitungSemester($tanggal);

        DB::table('matakuliah')->where('id_matakuliah', $id)->update([
            'id_lab' => $request->id_lab,
            'jamMasuk' => $request->jamMasuk,
            'jamKeluar' => $request->jamKeluar,
            'sks' => $request->sks,
            'matkul' => $request->matkul,
            'kelas' => $request->kelas,
            'dosen' => $request->dosen,
            'ail' => $request->ail,
            'tanggal' => $tanggal,
            'tanggalSelesai' => $tanggalSelesai,
            'semester' => $semester,
            'hari' => $request->hari,
        ]);

        return redirect()->route('matkul.index')->with('success', 'Matakuliah berhasil diperbarui');
    }

    private function hitungSemester($tanggalSelesai)
    {
        return (new \DateTime($tanggalSelesai) >= new \DateTime(date('Y') . '-09-01')) ? 'ganjil' : 'genap';
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('matakuliah')->where('id_matakuliah', $id)->delete();
        return redirect()->route('matkul.index')->with('success', 'Matakuliah berhasil dihapus');
    }
}

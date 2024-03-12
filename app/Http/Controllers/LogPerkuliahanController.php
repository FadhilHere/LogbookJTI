<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class LogPerkuliahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select(DB::raw("SELECT * FROM logkuliah"));
        return view('landing', compact('data'));
    }


    public function getMatkulList($idLab)
    {
        $currentDate = Carbon::now();
        $semester = ($currentDate->month >= 9 && $currentDate->month <= 2) ? 'genap' : 'ganjil';

        $matakuliahs = DB::table('matakuliah')
            ->where('id_lab', $idLab)
            ->where('semester', $semester)
            ->get();
        // dd($matakuliahs);
        return $matakuliahs;
    }




    public function getKelasData(Request $request)
    {
        $term = $request->input('q');

        
        $kelas = DB::table('kelas')
            ->where('nama_kelas', 'like', '%' . $term . '%')
            ->get();

        $kelasData = [];
        foreach ($kelas as $kelasItem) {
            $kelasData[] = [
                'id' => $kelasItem->id_kelas,
                'text' => $kelasItem->nama_kelas,
            ];
        }

        return response()->json($kelasData);
    }


    public function getMatkulInfo($idLab, $idMatkul)
    {
        
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
    public function create()
    {
        $labs = DB::table('lab')->get();
        $kelas = DB::table('kelas')->get();

        $idLab = request('lab') ?? $labs->first()->id_lab;


        $matakuliahs = $this->getMatkulList($idLab);

      
        $firstMatkul = $matakuliahs->first();

        $matkulInfo = $firstMatkul ? $this->getMatkulInfo($idLab, $firstMatkul->id_matakuliah) : null;
        // dd($matkulInfo);
        return view('kuliah', compact('labs', 'matakuliahs', 'matkulInfo', 'kelas'));
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
            'lab' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'dosen' => 'required',
            'ail' => 'required',
            'matkul' => 'required',
            'pc' => 'required',
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

        $jamMasuk = \Carbon\Carbon::parse($request->input('jamMasuk'))->format('H:i:s');
        $jamKeluar = \Carbon\Carbon::parse($request->input('jamKeluar'))->format('H:i:s');

        $durasi = Carbon::parse($jamKeluar)->diffInMinutes(Carbon::parse($jamMasuk));


        DB::table('logkuliah')->insert([
            'id_lab' => $request->input('lab'),
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'kelas' => $request->input('kelas'),
            'dosen' => $request->input('dosen'),
            'ail' => $request->input('ail'),
            'matkul' => $request->input('matkul'),
            'pc' => $request->input('pc'),
            'jamMasuk' => $jamMasuk,
            'jamKeluar' => $jamKeluar,
            'tanggal' => $request->input('tanggal'),
            'monitor' => $request->input('monitor'),
            'keyboard' => $request->input('keyboard'),
            'mouse' => $request->input('mouse'),
            'jaringan' => $request->input('jaringan'),
            'keterangan' => $request->input('keterangan'),
            'alat' => $request->input('alat'),
            'durasi' => $durasi,
        ]);

        return redirect('/')->with(['success' => 'Data LogBook Berhasil Disimpan!']);

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
        $data = DB::table('logkuliah')->where('id_lab', $id)->first();
        return view('LogPerkuliahan.edit', compact('data'));
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
            'Lab' => 'required',
            'tanggal' => 'required',
            'jamMasuk' => 'required',
            'jamKeluar' => 'required',
            'sks' => 'required',
            'matakuliah' => 'required',
            'dosenail' => 'required',
            'kelas' => 'required',
            'jumlahmahasiswa' => 'required',
        ]);


        DB::update(
            "UPDATE logkuliah SET  `Lab`=?, `tanggal`=?, `jamMasuk`=?, `jamKeluar`=?, `sks`=?, `mataKuliah`=?, `dosenAil`=?, `kelas`=?, `jumlahMahasiswa`=? WHERE `id_lab`=?",
            [$request->Lab, $request->tanggal, $request->jamMasuk, $request->jamKeluar, $request->sks, $request->matakuliah, $request->dosenail, $request->kelas, $request->jumlahmahasiswa, $id]
        );
        return redirect()->route('LogKegiatan.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('logkuliah')->where('id_lab', $id)->delete();

        return redirect()->route('LogPerkuliahan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
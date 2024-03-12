<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class PcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapc = DB::select(DB::raw("SELECT * FROM kelas"));
        return view('superadmin.labpc', compact('datapc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existingLab = DB::table('kelas')->where('nama_kelas', $request->input('nama_kelas'))->first();

        if ($existingLab) {
            // Lab dengan nama_kelas yang sama sudah ada
            return redirect()->route('labpc.index')->withInput()->withErrors(['nama_kelas' => 'Ruang Lab sudah ada.'])->with(['error' => 'Data Kelas Sudah Ada!']);
        }

        try {
            $this->validate($request, [
                'nama_kelas' => 'required',
            ]);

            DB::table('kelas')->insert([
                'nama_kelas' => $request->input('nama_kelas'),
            ]);

            return redirect()->route('labpc.index')->with(['success' => 'kelas Data Berhasil Disimpan!']);
        } catch (QueryException $e) {
            // Pengecualian lain selain validasi unik
            return redirect()->route('labpc.index')->withInput()->withErrors(['nama_kelas' => 'Gagal menyimpan kelas Data.'])->with(['error' => 'Data kelas Sudah Ada!']);
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datapc = DB::table('kelas')->where('id_kelas', $id)->first();
        return view('superadmin.edit', compact('datapc'));
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
        $existingLab = DB::table('kelas')->where('nama_kelas', $request->input('nama_kelas'))->first();

        if ($existingLab) {
            // Lab dengan nama_kelas yang sama sudah ada
            return redirect()->route('labpc.index')->withInput()->withErrors(['nama_kelas' => 'Ruang Lab sudah ada.'])->with(['error' => 'Data Kelas Sudah Ada!']);
        }

        try {
            $this->validate($request, [
                'nama_kelas' => 'required',
            ]);

            DB::table('kelas')->where('id_kelas', $id)->update([
                'nama_kelas' => $request->input('nama_kelas'),
            ]);

            return redirect()->route('labpc.index')->with(['success' => 'kelas Data Berhasil Diubah!']);
        } catch (QueryException $e) {
            // Pengecualian lain selain validasi unik
            return redirect()->route('labpc.index')->withInput()->withErrors(['nama_kelas' => 'Gagal menyimpan kelas Data.'])->with(['error' => 'Data kelas Sudah Ada!']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kelas')->where('id_kelas', $id)->delete();
        return redirect()->route('labpc.index')->with(['success' => 'Data Kelas Berhasil Dihapus!']);
    }
}

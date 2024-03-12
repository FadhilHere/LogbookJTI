<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalab = DB::select(DB::raw("SELECT * FROM lab"));
        $datapc = DB::select(DB::raw("SELECT * FROM kelas"));
        return view('superadmin.labpc', compact('datalab', 'datapc'));

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
        $existingLab = DB::table('lab')->where('ruang_lab', $request->input('ruang_lab'))->first();

        if ($existingLab) {
            // Lab dengan ruang_lab yang sama sudah ada
            return redirect()->route('labpc.index')->withInput()->withErrors(['ruang_lab' => 'Ruang Lab sudah ada.'])->with(['error' => 'Data Lab Sudah Ada!']);
        }

        try {
            $this->validate($request, [
                'ruang_lab' => 'required',
            ]);

            DB::table('lab')->insert([
                'ruang_lab' => $request->input('ruang_lab'),
            ]);

            return redirect()->route('labpc.index')->with(['success' => 'Lab Data Berhasil Disimpan!']);
        } catch (QueryException $e) {
            // Pengecualian lain selain validasi unik
            return redirect()->route('labpc.index')->withInput()->withErrors(['ruang_lab' => 'Gagal menyimpan Lab Data.'])->with(['error' => 'Data Lab Sudah Ada!']);
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
        $datalab = DB::table('lab')->where('id_lab', $id)->first();

        return view('superadmin.edit', compact('datalab'));
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
        $existingLab = DB::table('lab')->where('ruang_lab', $request->input('ruang_lab'))->first();

        if ($existingLab) {
            // Lab dengan ruang_lab yang sama sudah ada
            return redirect()->route('labpc.index')->withInput()->withErrors(['ruang_lab' => 'Ruang Lab sudah ada.'])->with(['error' => 'Data Lab Sudah Ada!']);
        }

        try {
            $this->validate($request, [
                'ruang_lab' => 'required',
            ]);

            DB::table('lab')->where('id_lab', $id)->update([
                'ruang_lab' => $request->input('ruang_lab'),
            ]);

            return redirect()->route('labpc.index')->with(['success' => 'Lab Data Berhasil Diubah!']);
        } catch (QueryException $e) {
            // Pengecualian lain selain validasi unik
            return redirect()->route('labpc.index')->withInput()->withErrors(['ruang_lab' => 'Gagal menyimpan Lab Data.'])->with(['error' => 'Data Lab Sudah Ada!']);
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
        DB::table('lab')->where('id_lab', $id)->delete();

        return redirect()->route('labpc.index')->with(['success' => 'Lab Data Berhasil Dihapus!']);
    }
}

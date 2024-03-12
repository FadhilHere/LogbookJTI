<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')->get();
        return view('superadmin.user', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'level' => 'required',
        ]);

        // Simpan data ke database menggunakan Query Builder
        DB::table('users')->insert([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')), // Encrypt password
            'level' => $request->input('level'),
        ]);

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
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
        $data = DB::table('users')->where('id', $id)->first();
        return view('user.edit', compact('data'));
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
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        $user = User::findOrFail($id);
	$user->username = $request->username;
	$user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        //redirect to index
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

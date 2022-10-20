<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

   //Siswa
   public function siswa ()
   {
       $users = DB::table('users')
               ->where('level', '=', 'user')
               ->get();

       //$admin = DB::table('admin')->get();
       return view('siswa.siswa',['users' => $users]);
   }

   public function tambah_data_siswa(Request $request)
   {
       DB::table('siswa')->insert([
           'nisn' => $request->nisn,
           'username' => $request->username,
           'nama' => $request->nama,
           'alamat' => $request->alamat,
           'tempat_lahir' => $request->tempat_lahir,
           'tgl_lahir' => $request->tgl_lahir,
           'jk' => $request->jk,
           'agama' => $request->agama,
           'no_hp' => $request->no_hp,
           'email' => $request->email,
       ]);
       return redirect('/siswa');
   
   }

   public function edit_siswa($id)
   {
        $siswa = DB::table('siswa')->where('nisn',$id)->get();
        return view('siswa_edit',['siswa' => $siswa]);
   }

   public function edit_data_siswa(Request $request)
   {
       DB::table('siswa')->where('nisn',$request->nisn)->update([
           'username' => $request->username,
           'nama' => $request->nama,
           'alamat' => $request->alamat,
           'tempat_lahir' => $request->tempat_lahir,
           'tgl_lahir' => $request->tgl_lahir,
           'jk' => $request->jk,
           'agama' => $request->agama,
           'no_hp' => $request->no_hp,
           'email' => $request->email,
       ]);
       return redirect('/siswa');
   }

   public function delete_siswa($id)
   {
       DB::table('siswa')->where('nisn',$id)->delete();
       return redirect('/siswa');
   }

   public function ujian ()
   {
    return view('siswa.ujian');
   }

   public function hasil_ujian ()
   {
    return view('siswa.hasil_ujian');
   }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Data Admin

    public function admin ()
    {

        $admin = DB::table('users')
                ->where('level', '=', 'admin')
                ->get();

        //$admin = DB::table('admin')->get();
        return view('admin.admin',['admin' => $admin]);
    }

    public function tambah_data_admin(Request $request)
    {
        DB::table('admin')->insert([
            'username' => $request->username,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);
        return redirect('/admin');
    
    }

    public function edit_admin($id)
    {
         $admin = DB::table('admin')->where('id_admin',$id)->get();
         return view('admin_edit',['admin' => $admin]);
    }

    public function edit_data_admin(Request $request)
    {
        DB::table('admin')->where('id_admin',$request->id_admin)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/admin');
    }

    public function delete_admin($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('/admin');
    }

    //Profile

    public function admin_profile ()
    {
        $users = DB::table('users')->get();
        return view('admin.profile',['users' => $users]);
    }

}

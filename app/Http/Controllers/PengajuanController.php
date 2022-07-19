<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

use App\User;
use Illuminate\Support\Facades\Hash;

class PengajuanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == '2' || Auth::user()->role == '3') {
            // dd('test');
            return view('admin.pengajuan');
        } else {
            return redirect('/admin/home');

        }
    }

    public function list(){
        $data = DB::table('pengajuan')->get();

        return response()->json(['message' => 'success', 'data' => $data]);
    }

    public function tambah(Request $request) {
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');
        $nominal = $request->input('nominal');
        $diajukan_oleh = Auth::user()->name;

        $insert = DB::table('pengajuan')->insert([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'nominal' => $nominal,
            'diajukan_oleh' => $diajukan_oleh,
            'status' => '1'
        ]);

        return true;
    }
    
    public function approve($id) {

        $update = DB::table('pengajuan')->update([
            'status' => '2'
        ]);

        return true;
    }

}

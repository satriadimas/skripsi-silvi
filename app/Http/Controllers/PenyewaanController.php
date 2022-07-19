<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyewaan;
use Auth;

class PenyewaanController extends Controller
{
    public function index() {
        if (Auth::user()->role != '1') {
            return redirect('/admin/home');
        }
        return view('penyewaan.index');
    }

    public function sewa($data) {
        if (Auth::user()->role != '1') {
            return redirect('/admin/home');
        }
        return view('penyewaan.tanggal', ['data' => $data]);
    }

    public function submit(Request $request) {
        // dd($request);
        $jumlah_tamu = $request->input('tamu');
        $tanggal = $request->input('tanggal');
        
        $image = $request->surat;

        $filename = $image->getClientOriginalName();
        $extension = $image->extension();

        $nama_file = $tanggal.Auth::user()->id;

        $new_filename = $nama_file.'.'.$extension;
        
        $do = $image->storeAs('images', $new_filename, 'public');

        $penyewaan = new Penyewaan;
        $penyewaan->tanggal = $tanggal;
        $penyewaan->jumlah_pengunjung = $jumlah_tamu;
        $penyewaan->user_id = Auth::user()->id;
        $penyewaan->status = 1;
        $penyewaan->peminjaman = $request->input('peminjaman') != '' ? $request->input('peminjaman') : 1;
        $penyewaan->kegiatan = $request->input('kegiatan');
        $penyewaan->bukti_pembayaran = $new_filename;
        
        if ($request->input('jumlah_kursi') != '' || $request->input('jumlah_kursi') != 0) {
            $penyewaan->jumlah_kursi = $request->input('jumlah_kursi');
        }

        $status = $penyewaan->save();

        

        return redirect('/home');
    }

    public function getByUserId($user_id) {
        $data = Penyewaan::where('user_id', $user_id)->get();

        return response()->json(['message' => 'success', 'data' => $data]);
    }

    public function getData() {
        $data = Penyewaan::orderBy('tanggal')->get();

        return response()->json(['message' => 'success', 'data' => $data]);
    }

    public function pembayaran($id_penyewaan) {
        $data = Penyewaan::find($id_penyewaan);
        return view('penyewaan.pembayaran', ['biaya' => $data->biaya, 'id' => $id_penyewaan]);
    }

    public function bayar(Request $request) {
        $image = $request->image;

        $filename = $image->getClientOriginalName();
        $extension = $image->extension();

        $id = $request->input('id');

        $new_filename = $id.'.'.$extension;
        
        $do = $image->storeAs('images', $new_filename, 'public');

        $data = Penyewaan::find($id);
        $data->bukti_pembayaran = $new_filename;
        $data->status = 3;
        $data->save();

        return redirect('/home');
    }
}

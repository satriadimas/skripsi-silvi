<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Penyewaan;
use App\User;
use App\Mail\SendMail;

class PenyewaanAdminController extends Controller
{
    public function index() {
        if (Auth::user()->role == '1') {
            return redirect('/home');
        }
        return view('admin.penyewaan');
    }

    public function list() {
        $data = Penyewaan::select('table_penyewaan.*', 'b.name', 'b.organisasi' , 'b.nohp', 'c.name as aprove_by')
                            ->leftJoin('users as b', function($join) {
                                $join->on('table_penyewaan.user_id', '=', 'b.id');
                              })
                            ->leftJoin('users as c', function($join2) {
                                $join2->on('table_penyewaan.disetujui_oleh', '=', 'c.id');
                            })
                            ->orderBy('table_penyewaan.status')->get();
        
        return response()->json(['message' => 'success', 'data' => $data]);
    }

    public function approve($penyewaan_id) {
        if (Auth::user()->role == '1') {
            return redirect('/home');
        }

        $data = Penyewaan::find($penyewaan_id);
        $tipe_sewa = $data->peminjaman == '1' ? 'Sewa Ruangan' : 'Sewa Ruangan + '. $data->jumlah_kursi .' kursi & kipas';

        $biaya = 3000000 + ($data->jumlah_kursi * 10000) + 350000;

        $user = User::find($data->user_id);

        $details = [
            'type' => '1',
            'title' => 'Halo '.$user->name,
            'body' => 'Permohonan untuk menyewa '. $tipe_sewa .' Sudah di approve oleh ' . Auth::user()->name .'. Segera lakukan pembayaran ke nomor rekening xxx dengan jumlah Rp. '.$biaya
        ];

        \Mail::to($user->email)->send(new SendMail($details));

        $data->status = 3;
        $data->disetujui_oleh = Auth::user()->id;
        $data->biaya = $biaya;
        $data->save();

        return true;

    }

    public function verifikasi($penyewaan_id) {
        if (Auth::user()->role == '1') {
            return redirect('/home');
        }

        $data = Penyewaan::find($penyewaan_id);
        $tipe_sewa = $data->peminjaman == '1' ? 'Sewa Ruangan' : 'Sewa Ruangan + kursi & kipas';

        $user = User::find($data->user_id);

        $details = [
            'type' => '1',
            'title' => 'Halo '.$user->name,
            'body' => 'Pembayaran untuk menyewa '. $tipe_sewa .' Sudah di verifikasi ' . Auth::user()->name .'. Silahkan datang ke waktu yang telah ditentukan'
        ];

        \Mail::to($user->email)->send(new SendMail($details));

        $data->status = 4;
        $data->save();

        return true;

    }

    public function verifikasiGantiRugi($penyewaan_id) {
        if (Auth::user()->role == '1') {
            return redirect('/home');
        }

        $data = Penyewaan::find($penyewaan_id);

        $data->status = 7;
        $data->save();

        return true;

    }

    public function laporKerusakan(Request $req) {
        if (Auth::user()->role == '1') {
            return redirect('/home');
        }

        $pesan = $req->input('pesan_kerusakan');
        $data = Penyewaan::find($req->input('id_penyewaan'));

        $user = User::find($data->user_id);

        $details = [
            'type' => '2',
            'title' => "Assalamualaikum Wr. Wb \r\n",
            'nama' => $user->name,
            'nohp' => $user->nohp,
            'email' => $user->email,
            'tanggal' => $data->tanggal
        ];

        \Mail::to($user->email)->send(new SendMail($details));

        $data->status = 6;
        $data->save();

        return true;

    }

    public function tolak($penyewaan_id) {
        if (Auth::user()->role == '1') {
            return redirect('/home');
        }

        $data = Penyewaan::find($penyewaan_id);
        $tipe_sewa = $data->peminjaman == '1' ? 'Sewa Ruangan' : 'Sewa Ruangan + '. $data->jumlah_kursi .' kursi & kipas';

        $biaya = 3000000 + ($data->jumlah_kursi * 10000) + 350000;

        $user = User::find($data->user_id);

        $details = [
            'type' => '1',
            'title' => 'Halo '.$user->name,
            'body' => 'Permohonan untuk menyewa '. $tipe_sewa .' ditolak'
        ];

        \Mail::to($user->email)->send(new SendMail($details));

        $data->status = 10;
        $data->disetujui_oleh = Auth::user()->id;
        $data->biaya = $biaya;
        $data->save();

        return true;

    }
}

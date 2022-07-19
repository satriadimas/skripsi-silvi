@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Pemesanan anda 
                    <a href="{{ url('/') }}/penyewaan-tanggal/" style="float: right;">Buat Reservasi</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal </th>
                                <th>Kegiatan</th>
                                <th>Penyewaan</th>
                                <th>Jumlah tamu</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data">
                            <td colspan="4">Belum ada reservasi</td>
                        </tbody>
                    </table>
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
@php
    if(isset($message)) {
        @endphp
            <script>
                alert("{{ $message }}")
            </script>
        @php
    }
@endphp
<script>
    var check_role = "{{ Auth::user()->role }}"

    init()

    function init() {
        var url = "{{ url('/') }}/get-data-penyewaan/{{ Auth::user()->id }}" 

        $.ajax({
            url: url,
            method: 'GET'
        }).done(function(data) {
            console.log(data)
            var content = ''
            for(var i = 0; i < data.data.length; i++) {
                var status = data.data[i].status
                var peminjaman = data.data[i].peminjaman == '1' ? 'Sewa Ruangan' : 'Sewa Ruangan + '+  data.data[i].jumlah_kursi +' kursi & kipas '
                var text
                var aksi

                if (status == 1) {
                    text = 'Menunggu Konfirmasi Admin'
                    // aksi = `<a href="{{url('/')}}/pembayaran/${data.data[i].id}"><button class="btn btn-warning">Bayar</button></a>`
                    aksi = ``
                } else if (status == 2) {
                    text = 'Menunggu Pelunasan'
                    aksi = `<a href="{{url('/')}}/pembayaran/${data.data[i].id}"><button class="btn btn-warning">Bayar </button></a>`
                    // aksi = ``
                }else if (status == 3) {
                    text = 'Menunggu Verifikasi Pembayaran'
                    // aksi = `<a href="{{url('/')}}/pembayaran/${data.data[i].id}"><button class="btn btn-warning">Bayar</button></a>`
                    aksi = ``
                } else if (status >= 4) {
                    text = 'Booking berhasil'
                    // aksi = `<a href="{{url('/')}}/pembayaran/${data.data[i].id}"><button class="btn btn-warning">Bayar</button></a>`
                    aksi = ``
                }
                content += `<tr>`
                content += `<td>${data.data[i].tanggal}</td>`
                content += `<td>${data.data[i].kegiatan}</td>`
                content += `<td>${peminjaman}</td>`
                content += `<td>${data.data[i].jumlah_pengunjung}</td>`
                content += `<td>${text}</td>`
                content += `<td>${aksi}</td>`
                content += `</tr>`
            }

            $('#data').html(content)
        }).fail(function(err) {
            console.log(err)
        })
    }
</script>
@endsection

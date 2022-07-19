@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Pembayaran 
                    
                </div>
                
                <div class="card-body">
                    <form action="{{url('/')}}/penyewaan/bayar" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Biaya</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{ $biaya }}" disabled>
                                <input type="hidden" name="id" value="{{ $id }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Bukti Pembayaran</label>

                            <div class="col-md-6">
                                <input id="password" type="file" class="form-control " name="image" required autocomplete="current-password">

                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    init()

    function init() {
        // var url = "{{ url('/') }}/get-data-penyewaan/{{ Auth::user()->id }}" 

        // $.ajax({
        //     url: url,
        //     method: 'GET'
        // }).done(function(data) {
        //     console.log(data)
        //     var content = ''
        //     for(var i = 0; i < data.data.length; i++) {
        //         var status = data.data[i].status
        //         var text
        //         var aksi

        //         if (status == 1) {
        //             text = 'Belum dibayar'
        //             aksi = `<a href="{{url('/')}}/pembayaran/${data.data[i].id}"><button class="btn btn-warning">Bayar</button></a>`
        //         }
        //         content += `<tr>`
        //         content += `<td>${data.data[i].tanggal}</td>`
        //         content += `<td>${data.data[i].jumlah_pengunjung}</td>`
        //         content += `<td>${text}</td>`
        //         content += `<td>${aksi}</td>`
        //         content += `</tr>`
        //     }

        //     $('#data').html(content)
        // }).fail(function(err) {
        //     console.log(err)
        // })
    }
</script>
@endsection

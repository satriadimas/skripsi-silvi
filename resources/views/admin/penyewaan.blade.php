@extends('layout.admin')

@section('other-css')

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Penyewaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Penyewaan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                      <div class="col-1">
                        <a href="form.php"><button type="button" class="btn btn-block bg-gradient-primary btn-sm">Tambah</button></a>
                      </div>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th width="10">No</th>
                            <th>Nama</th>
                            <th>Surat Permohonan</th>
                            <th>No HP</th>
                            <th>Tanggal</th>
                            <th>Peminjaman</th>
                            <th>Kegiatan</th>
                            <th>Jumlah Pengunjung</th>
                            <th>Status</th>
                            <th>Disetujui Oleh</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
          
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Laporan Kerusakan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="col-md-12">
                  Anda Yakin akan melaporkan kerusakan?
              </div>
              <input type="hidden" id="id-kerusakan">
              <!-- </div> -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary" id="lapor-kerusakan">Lapor Kerusakan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('other-js')
<script src="{{ asset('/')}}admin/dist/js/pages/dashboard.js"></script>
<script>
  init()

  function init() {
      var url = "{{ url('/') }}/admin/penyewaan/list" 

      $.ajax({
          url: url,
          method: 'GET'
      }).done(function(data) {
          console.log(data)
          var content = ''

          for(var i = 0; i < data.data.length; i++) {
              var status = data.data[i].status
              var peminjaman = data.data[i].peminjaman == '1' ? 'Sewa Ruangan' : 'Sewa Ruangan + ' + data.data[i].jumlah_kursi + ' kursi & kipas'
              var text
              var aksi

              if (status == 1) {
                  text = 'Menunggu Konfirmasi Admin'
                  aksi = `<button class="btn btn-warning" onclick="aprove(${data.data[i].id})">Approve</button><button class="btn btn-danger" onclick="tolak(${data.data[i].id})">Tolak</button>`
                  // aksi = ``
              }else if (status == 2) {
                  text = 'Menunggu Pembayaran'
                  // aksi = `<button class="btn btn-warning" onclick="aprove(${data.data[i].id})">Approve</button>`
                  aksi = ``
              } else if (status == 3) {
                  text = 'Menunggu Verifikasi Pembayaran'
                  aksi = `<button class="btn btn-warning" onclick="verifikasi(${data.data[i].id})">Verifikasi</button>`
                  // aksi = ``
              } else if (status == 4) {
                  // var storage = "{{storage_path('app/public')}}"
                  // storage = storage.replace('\\', "/")
                  text = 'Booking berhasil'
                  // aksi = `<button class="btn btn-warning" onclick="verifikasi(${data.data[i].id})">Verifikasi</button><a href="/images/${data.data[i].bukti_pembayaran}" target="_blank"><button class="btn btn-info">Bukti Transfer</button></a>`
                  aksi = ``
              }  else if (status == 6) {
                  // var storage = "{{storage_path('app/public')}}"
                  // storage = storage.replace('\\', "/")
                  text = 'dilakukan pelaporan kerusakan'
                  // aksi = `<button class="btn btn-warning" onclick="verifikasi(${data.data[i].id})">Verifikasi</button><a href="/images/${data.data[i].bukti_pembayaran}" target="_blank"><button class="btn btn-info">Bukti Transfer</button></a>`
                  aksi = `<button class="btn btn-warning" onclick="gantiRugi(${data.data[i].id})">Verifikasi Status Kerusakan</button>`
              } else if (status == 7) {
                  // var storage = "{{storage_path('app/public')}}"
                  // storage = storage.replace('\\', "/")
                  text = 'Kerusakan sudah diganti rugi oleh konsumen'
                  // aksi = `<button class="btn btn-warning" onclick="verifikasi(${data.data[i].id})">Verifikasi</button><a href="/images/${data.data[i].bukti_pembayaran}" target="_blank"><button class="btn btn-info">Bukti Transfer</button></a>`
                  aksi = ``
              } else if (status == 10) {
                  // var storage = "{{storage_path('app/public')}}"
                  // storage = storage.replace('\\', "/")
                  text = 'Permohonan ditolak'
                  // aksi = `<button class="btn btn-warning" onclick="verifikasi(${data.data[i].id})">Verifikasi</button><a href="/images/${data.data[i].bukti_pembayaran}" target="_blank"><button class="btn btn-info">Bukti Transfer</button></a>`
                  aksi = ``
              } 

              var now = new Date()
              var tanggal = new Date(data.data[i].tanggal)
              console.log(tanggal)
              if (status == 4  && now > tanggal ) {
                text = 'Kegiatan Telah selesai'
                // aksi = `<button class="btn btn-warning" onclick="laporKerusakan(${data.data[i].id})">Lapor Kerusakan</button>`
                aksi = `<button class="btn btn-warning" data-toggle="modal" data-target="#modal-default" onclick="openmodal(${data.data[i].id})">Lapor Kerusakan</button>`
              } 

              var disetujui_oleh = data.data[i].aprove_by != null ? data.data[i].aprove_by : '' 
              content += `<tr>`
              content += `<td>${i + 1}</td>`
              content += `<td>${data.data[i].name}</td>`
              content += `<td><a href="{{ env('STORAGE_URL') }}/images/${data.data[i].bukti_pembayaran}" target="_blank"><button class="btn btn-info">Lihat</button></a></td>`
              content += `<td>${data.data[i].nohp}</td>`
              content += `<td>${data.data[i].tanggal}</td>`
              content += `<td>${peminjaman}</td>`
              content += `<td>${data.data[i].kegiatan}</td>`
              content += `<td>${data.data[i].jumlah_pengunjung}</td>`
              content += `<td>${text}</td>`
              content += `<td>${disetujui_oleh}</td>`
              content += `<td>${aksi}</td>`
              content += `</tr>`
          }

          $('tbody').html(content)
      }).fail(function(err) {
          console.log(err)
      })
  }

  function aprove(id) {
    $(`button[onclick="approve(${id})"]`).prop('disabled', true)
    var url = "{{url('/')}}/admin/penyewaan/acc/" + id
    $.ajax({
          url: url,
          method: 'GET'
      }).done(function(data) {
        if (data) {
          $(`button[onclick="approve(${id})"]`).prop('disabled', false)
          alert('Berhasil Melakukan Aprove')
          init()
        }
      }).fail(function(err) {
          console.log(err)
      })
  }

  function verifikasi(id) {
    $(`button[onclick="verifikasi(${id})"]`).prop('disabled', true)
    var url = "{{url('/')}}/admin/penyewaan/verifikasi/" + id
    $.ajax({
          url: url,
          method: 'GET'
      }).done(function(data) {
        if (data) {
          $(`button[onclick="verifikasi(${id})"]`).prop('disabled', false)
          alert('Berhasil Melakukan Verifikasi')
          init()
        }
      }).fail(function(err) {
          console.log(err)
      })
  }

  function gantiRugi(id) {
    $(`button[onclick="gantiRugi(${id})"]`).prop('disabled', true)
    var url = "{{url('/')}}/admin/penyewaan/verifikasi-ganti-rugi/" + id
    $.ajax({
          url: url,
          method: 'GET'
      }).done(function(data) {
        if (data) {
          $(`button[onclick="verifikasi(${id})"]`).prop('disabled', false)
          alert('Berhasil Melakukan Verifikasi Ganti Rugi')
          init()
        }
      }).fail(function(err) {
          console.log(err)
      })
  }

  function laporKerusakan(id, pesan) {
    $(`button[onclick="openmodal(${id})"]`).prop('disabled', true)
    var url = "{{url('/')}}/admin/penyewaan/lapor-kerusakan/" + id
    $.ajax({
          url: url,
          method: 'POST',
          data: {
            "_token": "{{ csrf_token() }}",
            "id_penyewaan": id
          }
      }).done(function(data) {
        if (data) {
          $(`button[onclick="openmodal(${id})"]`).prop('disabled', false)
          alert('Berhasil Melaporkan Kerusakan ke konsumen')
          init()
        }
      }).fail(function(err) {
          console.log(err)
      })
  }

  function openmodal(id) {
    $('#id-kerusakan').val('')
    $('#id-kerusakan').val(id)
  }

  $('#lapor-kerusakan').click(function() {
    var id = $('#id-kerusakan').val()
    var pesan = $('#pesan-kerusakan').val()
    $('button[data-dismiss="modal"]').trigger('click')
    laporKerusakan(id, pesan)
  })

  function tolak(id) {
    $(`button[onclick="approve(${id})"]`).prop('disabled', true)
    var url = "{{url('/')}}/admin/penyewaan/tolak/" + id
    $.ajax({
          url: url,
          method: 'GET'
      }).done(function(data) {
        if (data) {
          $(`button[onclick="approve(${id})"]`).prop('disabled', false)
          alert('Berhasil Melakukan Penolakan')
          init()
        }
      }).fail(function(err) {
          console.log(err)
      })
  }
</script>
@endsection
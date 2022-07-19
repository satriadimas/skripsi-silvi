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
            <h1 class="m-0">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                      <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-default" onclick="openmodal()">Tambah</button>
                    <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th width="10">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>No HP</th>
                            
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
              <h4 class="modal-title">Tambah User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="col-md-12">
                  <label for="">Nama</label>
                  <input id="name" type="text" class="form-control" placeholder="nama">
              </div>
              <div class="col-md-12">
                  <label for="">Email</label>
                  <input id="email" type="text" class="form-control" placeholder="Email">
              </div>
              <div class="col-md-12">
                  <label for="">Role</label>
                  <select id="role" class="form-control">
                    <option value="2">Admin</option>
                    <option value="3">Kasi Promosi</option>
                  </select>
              </div>
              <div class="col-md-12">
                  <label for="">No HP</label>
                  <input id="nohp" type="text" class="form-control" placeholder="Nomor HP">
              </div>
              
              <input type="hidden" id="id-kerusakan">
              <!-- </div> -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary" id="btn-tambah">Submit</button>
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
      var url = "{{ url('/') }}/admin/user-management/list" 

      $.ajax({
          url: url,
          method: 'GET'
      }).done(function(data) {
          console.log(data)
          var content = ''

          for(var i = 0; i < data.data.length; i++) {
              var role = data.data[i].role == '2' ? 'Admin' : 'Kasi Promosi'
              content += `<tr>`
              content += `<td>${i + 1}</td>`
              content += `<td>${data.data[i].name}</td>`
              content += `<td>${data.data[i].email}</td>`
              content += `<td>${role}</td>`
              content += `<td>${data.data[i].nohp}</td>`
              content += `<td><button class="btn btn-danger" onclick="hapus(${data.data[i].id})">Hapus</button></td>`
              content += `</tr>`
          }

          $('tbody').html(content)
      }).fail(function(err) {
          console.log(err)
      })
  }

  function hapus(id) {
    var url = "{{url('/')}}/admin/user-management/delete/" + id
    $.ajax({
          url: url,
          method: 'GET'
      }).done(function(data) {
        if (data) {
          alert('Berhasil Hapus Akun')
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

  $('#btn-tambah').click(function() {
    // var id = $('#id-kerusakan').val()
    var name = $('#name').val()
    var email = $('#email').val()
    var nohp = $('#nohp').val()
    var role = $('#role').val()
    $('button[data-dismiss="modal"]').trigger('click')
    simpan(name, email, nohp, role)
  })

  function simpan(name, email, nohp, role) {
    var url = "{{url('/')}}/admin/user-management/tambah"
    $.ajax({
          url: url,
          data: {
            _token: "{{ @csrf_token() }}",
            name: name,
            email: email,
            nohp: nohp,
            role: role
          },
          method: 'post'
      }).done(function(data) {
        if (data) {
          // $(`button[onclick="approve(${id})"]`).prop('disabled', false)
          alert('Berhasil Menambahkan User')
          init()
        }
      }).fail(function(err) {
          console.log(err)
      })
  }
</script>
@endsection
@extends('layout.app')

@section('other-css')
<link rel="stylesheet" href="{{ asset('calendar/dist/calendar-gc.min.css') }}" />

@endsection

@section('content')


<!-- ***** Reservation Us Area Starts ***** -->
<section class="section" id="reservation">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Reservasi</h6>
                    </div>
                    <p>Donec pretium est orci, non vulputate arcu hendrerit a. Fusce a eleifend riqsie, namei sollicitudin urna diam, sed commodo purus porta ut.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="phone">
                                <i class="fa fa-phone"></i>
                                <h4>Phone Numbers</h4>
                                <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="message">
                                <i class="fa fa-envelope"></i>
                                <h4>Emails</h4>
                                <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <form id="contact" action="{{url('/')}}/penyewaan-tanggal/submit" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="row">
                        <div class="col-lg-12">
                            <h4>Form Reservasi</h4>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                            <input name="name" type="text" id="name" placeholder="Your Name*" value=" {{Auth::user()->name}}" disabled>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                            <input name="nohp" type="text" id="name" placeholder="Your Name*" value=" {{Auth::user()->nohp}}" disabled>
                            </fieldset>
                        </div>
                        
                        
                        <div class="col-lg-12">
                            <fieldset>
                            <input name="email" type="text" id="email" value=" {{Auth::user()->email}}" placeholder="Your Email Address" disabled>
                        </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <fieldset>
                            <input name="tanggal" type="text" id="tanggal" value="{{$data}}" readonly>
                            </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <fieldset style="margin-bottom: 15px;">
                            <input name="tamu" type="number" min="1" max="200" placeholder="Jumlah Tamu" id="tamu" required style="margin-bottom: 0px;">  <small style="margin-bottom: 15px;">max 200</small>
                            </fieldset> 
                        </div>
                        <div class="col-lg-12">
                          <select name="peminjaman" id="peminjaman">
                            <option value="">Pilih Paket</option>
                            <option value="1">Sewa Ruangan</option>
                            <option value="2">Sewa Ruangan + kursi & kipas</option>
                          </select>
                        </div>
                        <div class="col-md-12">
                          <fieldset style="display: none; margin-bottom: 15px;" id="jumlah_kursi_field">
                            <input name="jumlah_kursi" type="number" min="1" max="200" placeholder="Jumlah Kursi" id="jumlah_kursi" style="margin-bottom: 0px;"><small style="margin-bottom: 15px;">max 200</small>
                            </fieldset> 
                        </div>
                        <div class="col-md-12 col-sm-12">
                          <fieldset>
                            <input name="kegiatan" type="text" placeholder="Kegiatan" id="kegiatan" required>
                            </fieldset> 
                        </div>
                        <div class="col-md-12 col-sm-12">
                          <label for="">Surat Permohonan</label>
                          <fieldset>
                            <input name="surat" type="file" placeholder="Kegiatan" id="surat" required>
                            </fieldset> 
                        </div>
                        <div class="col-lg-12 mt-5">
                            <fieldset>
                            <button type="submit" class="main-button-icon">Buat Reservasi</button>
                            </fieldset>
                        </div>
                        <div class="col-lg-12 mt-2">
                            Silahkan download template Surat Permohonan <a href="{{ asset('/template/SURAT PERMOHONAN PEMINJAMAN BALAIRUNG.docx') }}">disini</a>
                            
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Reservation Area Ends ***** -->
 
@endsection

@section('other-js')
  <script>
    $('#form-submit').click(function() {
      var jumlah_tamu = $('#tamu').val()
      var tanggal = $('#tanggal').val()
      var peminjaman = $('#peminjaman').val()
      var kegiatan = $('#kegiatan').val()
      var jumlah_kursi = $('#jumlah_kursi').val()
      var surat = $('#surat').val()

      console.log(surat)
      return false
      if (jumlah_tamu == '' || jumlah_tamu > 200) {
        alert('Anda harus mengisi jumlah tamu dengan benar!')
        return false
      }

      if (peminjaman == '') {
        alert('Anda harus mengisi Paket!')
        return false
      }

      if (kegiatan == '') {
        alert('Anda harus mengisi kegiatan!')
        return false
      }

      var url = "{{url('/')}}/penyewaan-tanggal/submit"
      $.ajax({
        url: url,
        method: 'post',
        data: {
          "_token": "{{ csrf_token() }}",
          "jumlah_tamu": jumlah_tamu,
          "tanggal": tanggal,
          "peminjaman": peminjaman,
          "kegiatan": kegiatan,
          "jumlah_kursi": jumlah_kursi

        }
      }).done(function(res){
        console.log(res)
        if (res) {
          alert('anda berhasil melakukan reservasi! silahkan tunggu kabar selanjutnya')
          window.location = "{{url('/')}}/home"
        }
      }).fail(function(err){
        console.log(err)
      })

    })

    $('#peminjaman').change(function() {
      var value = $('#peminjaman').val()
      if (value == 2) {
        $('#jumlah_kursi_field').css('display', 'block')
      } else {
        $('#jumlah_kursi_field').css('display', 'none')
      }
    })
  </script>

  @extends('layout.click-menu')
@endsection


@extends('layout.app')

@section('other-css')
<link rel="stylesheet" href="{{ asset('calendar/dist/calendar-gc.min.css') }}" />

@endsection

@section('content')


<!-- ***** Reservation Us Area Starts ***** -->
<section class="section" id="reservation">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="contact-form">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Tanggal Reservasi</h4>
                            </div>
                            <div class="col-lg-12" id="calendar"></div>

                        </div>
                    </form>
                </div>
                <div id="hidden" style="display: none;"></div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Reservation Area Ends ***** -->
 
@endsection

@section('other-js')
<script src="{{ asset('calendar/dist/calendar-gc.min.js') }}"></script>
<script>
    $(function (e) {
      var events_arr = []
      $.ajax({
        url: "{{ url('/') }}/get-data-reservasi",
        method: 'GET',
        async: false
      }).done(function(res){
        console.log(res)
        
        for(let i=0; i < res.data.length; i++) {
          var hidden = ''
          hidden += `<label data-tanggal="${res.data[i].tanggal}"></label>`
          $('#hidden').append(hidden)
          events_arr.push({
            date: new Date(res.data[i].tanggal),
            eventName: "Booked",
            className: "badge bg-warning",
            onclick(e, data) {
              console.log(data);
            },
            dateColor: "gray"
          })
        }
      }).fail(function(err){
        console.log(err)
      })
    var calendar = $("#calendar").calendarGC({
      dayBegin: 0,
      prevIcon: '&#x3c;',
      nextIcon: '&#x3e;',
      onPrevMonth: function (e) {
        console.log("prev");
        console.log(e)
      },
      onNextMonth: function (e) {
        console.log("next");
        console.log(e)
      },
      events: events_arr,
      onclickDate: function (e, data) {
        var now = new Date();

        if (data.datejs <= now ) {
          alert('Anda tidak bisa memilih tanggal ini')
          return false
        }
        // var date = new Date(data.datejs)
        var date = data.datejs
        var fullDate = + date.getFullYear() + '-' + twoDigit(parseInt(date.getMonth()) + 1) + '-' + twoDigit(date.getDate())

        var hidden_div = $(`label[data-tanggal="${fullDate}"]`)

        if (hidden_div.length > 0) {
          alert('Anda tidak bisa memilih tanggal ini')
          return false
        }

        var url = '{{ url("/") }}/penyewaan-tanggal/' + fullDate
        // var url = '{{ url("/") }}/home/'
        window.location = url
        // console.log(date);

      }
    });
  })

  function twoDigit(v) {
    var val = String(v)
    if (val.length == 1) {
      return '0'+val
    } else {
      return val
    }
  }
</script>
@include('layout/click-menu')
@endsection


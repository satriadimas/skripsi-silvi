@extends('layout.app')

@section('other-css')

@endsection

@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="left-content">
                    <div class="inner-content">
                        <h4>Anjungan Sumatera Barat TMII</h4>
                        <h6>Pengalaman Terbaik</h6>
                        <div class="main-white-button scroll-to-section">
                            <a href="{{ url('/')}}/penyewaan-tanggal">Buat Reservasi</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="main-banner header-text">
                    <div class="Modern-Slider">
                        <!-- Item -->
                        <div class="item">
                        <div class="img-fill">
                            <img src="{{ asset('images/gambar 1.jpg') }}" alt="">
                        </div>
                        </div>
                        <!-- // Item -->
                        <!-- Item -->
                        <!-- <div class="item">
                        <div class="img-fill">
                            <img src="{{ asset('images/slide-02.jpg') }}" alt="">
                        </div>
                        </div> -->
                        <!-- // Item -->
                        <!-- Item -->
                        <!-- <div class="item">
                        <div class="img-fill">
                            <img src="{{ asset('images/slide-03.jpg') }}" alt="">
                        </div>
                        </div> -->
                        <!-- // Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** About Area Starts ***** -->
<section class="section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Tentang Kami</h6>
                        <h2>Kami menyediakan tempat untuk kamu</h2>
                    </div>
                    <p>Dalam memperkenalkan wajah 'Ranah Minang', propinsi Sumatera Barat membangun anjungan di TMII dengan model rumah Gadang dan sebuah balairung sebagai bangunan induknya. Rumah ini aslinya dihuni oleh sebuah keluarga besar yang dikepalai oleh seorang Ninik Mamak yang bergelah Datuk, sedangkan balairung aslinya merupakan tempat bermusyawarah para Ninik Mamak. Namun di anjungan ini, kedua bangunan tersebut digunakan memamerkan aspek budaya dan aktifitas kesenian sesuai dengan fungsinya sebagai Show Window daerah Sumatera Barat. Hubungi kami untuk informasi lebih.</p>
                    <!-- <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('images/about-thumb-01.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/about-thumb-02.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/about-thumb-03.jpg') }}" alt="">
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="right-content">
                    <div class="thumb">
                        <a rel="nofollow" href="https://www.youtube.com/watch?v=SUH0sVluT1E&t=12s"><i class="fa fa-play"></i></a>
                        <img src="{{ asset('images/balairung.PNG') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** About Area Ends ***** -->

<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Galeri</h6>
                    <h2>Galeri Balairung Anjungan sumatera barat</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                <div class="item">
                    <div class='card card1' style="background-image: url('{{ asset('images/anjungan1.JPG') }}');">
                        <!-- <div class="price"><h6>$14</h6></div> -->
                        <!-- <div class='info'>
                            <h1 class='title'>Chocolate Cake</h1>
                            <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="item">
                    <div class='card card2' style="background-image: url('{{ asset('images/anjungan2.jpg') }}');">
                        <!-- <div class="price"><h6>$22</h6></div> -->
                        <!-- <div class='info'>
                            <h1 class='title'>Klassy Pancake</h1>
                            <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="item">
                    <div class='card card3' style="background-image: url('{{ asset('images/anjungan3.png') }}');">
                        <!-- <div class="price"><h6>$18</h6></div> -->
                        <!-- <div class='info'>
                            <h1 class='title'>Tall Klassy Bread</h1>
                            <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="item">
                    <div class='card card4' style="background-image: url('{{ asset('images/anjungan4.jpg') }}');">
                        <!-- <div class="price"><h6>$10</h6></div> -->
                        <!-- <div class='info'>
                            <h1 class='title'>Blueberry CheeseCake</h1>
                            <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="item">
                    <div class='card card5' style="background-image: url('{{ asset('images/anjungan5.jpg') }}');">
                        <!-- <div class="price"><h6>$8.50</h6></div> -->
                        <!-- <div class='info'>
                            <h1 class='title'>Klassy Cup Cake</h1>
                            <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="item">
                    <div class='card card6' style="background-image: url('{{ asset('images/anjungan6.jpg') }}');">
                        <!-- <div class="price"><h6>$7.25</h6></div> -->
                        <!-- <div class='info'>
                            <h1 class='title'>Klassic Cake</h1>
                            <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Menu Area Ends ***** -->

<!-- ***** Chefs Area Starts ***** -->
<!-- <section class="section" id="chefs">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 text-center">
                <div class="section-heading">
                    <h6>Our Chefs</h6>
                    <h2>We offer the best ingredients for you</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="chef-item">
                    <div class="thumb">
                        <div class="overlay"></div>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <img src="{{ asset('images/chefs-01.jpg') }}" alt="Chef #1">
                    </div>
                    <div class="down-content">
                        <h4>Randy Walker</h4>
                        <span>Pastry Chef</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chef-item">
                    <div class="thumb">
                        <div class="overlay"></div>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                        <img src="{{ asset('images/chefs-02.jpg') }}" alt="Chef #2">
                    </div>
                    <div class="down-content">
                        <h4>David Martin</h4>
                        <span>Cookie Chef</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chef-item">
                    <div class="thumb">
                        <div class="overlay"></div>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                        </ul>
                        <img src="{{ asset('images/chefs-03.jpg') }}" alt="Chef #3">
                    </div>
                    <div class="down-content">
                        <h4>Peter Perkson</h4>
                        <span>Pancake Chef</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- ***** Chefs Area Ends ***** -->

<!-- ***** Reservation Us Area Starts ***** -->
<!-- <section class="section" id="reservation">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Contact Us</h6>
                        <h2>Here You Can Make A Reservation Or Just walkin to our cafe</h2>
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
                    <form id="contact" action="" method="post">
                        <div class="row">
                        <div class="col-lg-12">
                            <h4>Table Reservation</h4>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <fieldset>
                            <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <fieldset>
                            <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                        </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <fieldset>
                            <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
                            </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <fieldset>
                            <select value="number-guests" name="number-guests" id="number-guests">
                                <option value="number-guests">Number Of Guests</option>
                                <option name="1" id="1">1</option>
                                <option name="2" id="2">2</option>
                                <option name="3" id="3">3</option>
                                <option name="4" id="4">4</option>
                                <option name="5" id="5">5</option>
                                <option name="6" id="6">6</option>
                                <option name="7" id="7">7</option>
                                <option name="8" id="8">8</option>
                                <option name="9" id="9">9</option>
                                <option name="10" id="10">10</option>
                                <option name="11" id="11">11</option>
                                <option name="12" id="12">12</option>
                            </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <div id="filterDate2">    
                                <div class="input-group date" data-date-format="dd/mm/yyyy">
                                <input  name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                                <div class="input-group-addon" >
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                </div>
                            </div>   
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <fieldset>
                            <select value="time" name="time" id="time">
                                <option value="time">Time</option>
                                <option name="Breakfast" id="Breakfast">Breakfast</option>
                                <option name="Lunch" id="Lunch">Lunch</option>
                                <option name="Dinner" id="Dinner">Dinner</option>
                            </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                            <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                            <button type="submit" id="form-submit" class="main-button-icon">Make A Reservation</button>
                            </fieldset>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- ***** Reservation Area Ends ***** -->

@endsection

@section('other-js')

@endsection
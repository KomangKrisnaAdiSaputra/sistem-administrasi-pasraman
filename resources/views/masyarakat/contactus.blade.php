@extends('layouts.appmasyarakat')
@section('container.isi')
@section('aktif.contactus', 'active')

<!-- hero area start -->
<section class="theme2 theme4 hero-area kontak ptb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="hero-area-content">
                    <h1 class="text-uppercase">HUBUNGI KAMI</h1>
                    <p>Informasi lebih lanjut terkait pemesanan dan pelaksanaan upacara bisa hubungi kami melalui kontak
                        yang tersedia maupun datang langsung ke alamat pasraman.</p>
                </div>
            </div>
        </div>
    </div>
</section><!-- hero area end -->
<!-- contact area start -->
<section class="ptb-80" id="email-us">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-6">
				        <div class="contact-form">
                            <h4>Get in Touch</h4>
				            <form action="#">
				                <input type="text" placeholder="Your Name">
				                <input type="email" placeholder="Email Address">
				                <textarea placeholder="Messege"></textarea>
				                <button class="krishok-btn">SEND</button>
				            </form>
				        </div>
				    </div> --}}
            <div class="col-lg-12">
                <div class="contact-form">
                    <h4>Alamat Pasraman Griya Gede Wayahan Buruan</h4>
                    <div class="contact-area">
                        <p>Kunjungan dapat dilakukan dengan datang langsung ke Pasraman Griya Buruan yang beroperasi dan
                            berlokasi sebagai berikut.</p>
                        <p>Operasional pukul 09.00-19.00 WITA setiap hari.</p>
                        <p>Jalan Giri Sari, Celuk, Buruan<br> Blahbatuh, Gianyar.</p>
                        <p>Email: pesramangriyagedewayahanburuan@gmail.com <br> Phone: 0819 0784 0384</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- contact gallery area end -->
<!-- contact map area start -->
<section>
    <div class="container">
        <div class="row map-area">
            <div class="col-lg-12">
                <div class="sec-title pt-75">
                    <h3>Cari Kami di Peta</h3>
                    <p>Informasi lebih detail terkait alamat pasraman bisa diakses melalui maps berikut.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="google-map"></div>
</section>
<!-- contact map area end -->
@endsection

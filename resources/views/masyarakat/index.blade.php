    <!-- hero area start -->
    @extends('layouts.appmasyarakat')
    @section('container.isi')
    @section('aktif.index', 'active')

    <style>
        .lb-number {
            display: none !important;
        }
    </style>

    <section class="hero-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-10">
                    <div class="hero-area-content ptb-80">
                        <h1>Pasraman Griya Gede Wayahan Buruan</h1>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium nobis esse ab veritatis
                            et autem, est quisquam. Ipsum, suscipit. Aspernatur numquam nulla rem magni, exercitationem
                            quisquam sint est vel aliquid.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="image-slider">
            <div class="item-content">
                <div class="item-slider item-slider1"></div>
                <div class="item-slider item-slider2"></div>
            </div>
        </div>
        <div class="item-thumbnail">
            <a href="#" data-slide-index="0">
                <div class="list-thumb list-thumb1"></div>
            </a>
            <a href="#" data-slide-index="1">
                <div class="list-thumb list-thumb2"></div>
            </a>
        </div>
        <!--/Slider thumbnail-->
    </section><!-- hero area end -->

    <!-- shopping product area start -->
    {{-- <section class="shopping-product ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="shopping-product-menu max-width-360">
                        <ul>
                            <li data-filter="*" class="active">All</li>
                            <li data-filter=".new">New</li>
                            <li data-filter=".best">Best Sells</li>
                            <li data-filter=".seasonal">Seasonal</li>
                            <li data-filter=".other">Others</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row product-item">
                <div class="col-lg-3 col-sm-6 new other">
                    <div class="sell-item max-width-360">
                        <div class="product-img">
                            <img src="{{ asset('assets/masyarakat/assets/img/main-product/5.jpg') }}" alt="">
                            <div class="product-img-overlay">
                                <a href="#" class="krishok-btn">Add to cart <i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <p><a href="product-details.html">Product Name</a></p>
                        <h5>$50.00</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 best seasonal">
                    <div class="sell-item max-width-360">
                        <div class="product-img">
                            <img src="{{ asset('assets/masyarakat/assets/img/main-product/6.jpg') }}" alt="">
                            <div class="product-img-overlay">
                                <a href="#" class="krishok-btn">Add to cart <i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <p><a href="product-details.html">Product Name</a></p>
                        <h5>$50.00</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 other">
                    <div class="sell-item max-width-360">
                        <div class="product-img">
                            <img src="{{ asset('assets/masyarakat/assets/img/main-product/7.jpg') }}" alt="">
                            <div class="product-img-overlay">
                                <a href="#" class="krishok-btn">Add to cart <i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <p><a href="product-details.html">Product Name</a></p>
                        <h5>$50.00</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 new best">
                    <div class="sell-item max-width-360">
                        <div class="product-img">
                            <img src="{{ asset('assets/masyarakat/assets/img/main-product/8.jpg') }}" alt="">
                            <div class="product-img-overlay">
                                <a href="#" class="krishok-btn">Add to cart <i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <p><a href="product-details.html">Product Name</a></p>
                        <h5>$50.00</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 other seasonal">
                    <div class="sell-item max-width-360">
                        <div class="product-img">
                            <img src="{{ asset('assets/masyarakat/assets/img/main-product/9.jpg') }}" alt="">
                            <div class="product-img-overlay">
                                <a href="#" class="krishok-btn">Add to cart <i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <p><a href="product-details.html">Product Name</a></p>
                        <h5>$50.00</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 new best">
                    <div class="sell-item max-width-360">
                        <div class="product-img">
                            <img src="{{ asset('assets/masyarakat/assets/img/main-product/10.jpg') }}" alt="">
                            <div class="product-img-overlay">
                                <a href="#" class="krishok-btn">Add to cart <i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <p><a href="product-details.html">Product Name</a></p>
                        <h5>$50.00</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 seasonal">
                    <div class="sell-item max-width-360">
                        <div class="product-img">
                            <img src="{{ asset('assets/masyarakat/assets/img/main-product/11.jpg') }}" alt="">
                            <div class="product-img-overlay">
                                <a href="#" class="krishok-btn">Add to cart <i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <p><a href="product-details.html">Product Name</a></p>
                        <h5>$50.00</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 best">
                    <div class="sell-item max-width-360">
                        <div class="product-img">
                            <img src="{{ asset('assets/masyarakat/assets/img/main-product/12.jpg') }}" alt="">
                            <div class="product-img-overlay">
                                <a href="#" class="krishok-btn">Add to cart <i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <p><a href="product-details.html">Product Name</a></p>
                        <h5>$50.00</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="active"><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- shopping product area end -->

    <!-- product area start -->
    <section class="product ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title">
                        <h2>Ingin mengetahui lebih detail? Yuk simak katalog di bawah.</h2>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem est, accusantium voluptatem
                            alias qui at, corrupti unde voluptatum asperiores a consectetur ipsum quae. Maiores eius
                            architecto exercitationem expedita veniam. Debitis?
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-8 offset-lg-0 offset-md-2">
                    <div class="tab-accordion pt-75">
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade active show">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/bayuh-rare.jpeg') }}"
                                    data-lightbox="example-set" data-title="Paket Bayuh Rare">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/bayuh-rare.jpeg') }}"
                                        alt="" style="width: 500px; height: 555px;">
                                </a>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/tiga-bulanan.jpeg') }}"
                                    data-lightbox="example-set" data-title="Paket Tiga Bulanan">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/tiga-bulanan.jpeg') }}"
                                        alt="" style="width: 500px; height: 555px;">
                                </a>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/lepas-aon-macolongan.jpeg') }}"
                                    data-lightbox="example-set" data-title="Paket Macolongan dan Tiga Bulanan">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/lepas-aon-macolongan.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                            <div id="menu4" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/pawiwahan.jpeg') }}"
                                    data-lightbox="example-set" data-title="Pawiwahan">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/pawiwahan.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                            <div id="menu5" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/sudiwidhani-tiga-bulanan.jpeg') }}"
                                    data-lightbox="example-set"
                                    data-title="Paket Sudhiwidani, Mecolongan, Tiga Bulanan, Petik Rambut, Metatah, Pawiwahan Lengkap">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/sudiwidhani-tiga-bulanan.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                            <div id="menu6" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/metatah-tingkat-bangkit.jpeg') }}"
                                    data-lightbox="example-set"
                                    data-title="Paket Metatah dan Tiga Bulanan Ngileh Lesung">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/metatah-tingkat-bangkit.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                            <div id="menu7" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/metatah-oton-gede.jpeg') }}"
                                    data-lightbox="example-set" data-title="Paket Metatah dan Oton Mapetik">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/metatah-oton-gede.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                            <div id="menu8" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/mawinten.jpeg') }}"
                                    data-lightbox="example-set" data-title="Pawintenan">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/mawinten.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                            <div id="menu10" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/metatah.jpeg') }}"
                                    data-lightbox="example-set" data-title="Metatah Lengkap">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/metatah.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                            <div id="menu11" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/bbayuh-oton.jpeg') }}"
                                    data-lightbox="example-set" data-title="Bayuh Oton Sapu Leger">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/bayuh-oton.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                            <div id="menu12" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/otonan.jpeg') }}"
                                    data-lightbox="example-set" data-title="Otonan">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/otonan.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                            <div id="menu15" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/magedong-gedongan.jpeg') }}"
                                    data-lightbox="example-set" data-title="Megedong Gedongan">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/magedong-gedongan.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                            <div id="menu16" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/nutug-kambuhan.jpeg') }}"
                                    data-lightbox="example-set" data-title="Nutug Kambuhan">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/nutug-kambuhan.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                            <div id="menu17" class="tab-pane fade">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/katalog/sudiwidhani-meras.jpeg') }}"
                                    data-lightbox="example-set" data-title="Sudhiwidani Meras Nak Alit">
                                    <img src="{{ asset('assets/masyarakat/assets/img/katalog/sudiwidhani-meras.jpeg') }}"
                                        alt="" style="width: 500px; height: 550px;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-75">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="active" data-toggle="tab" href="#menu1">
                                <div class="product-list">
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Bayuh Rare</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu2">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Tiga Bulanan</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu3">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Paket Macolongan dan Tiga Bulanan</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu4">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Pawiwahan</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu5">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Paket Sudhiwidani, Mecolongan, Tiga Bulanan, Petik Rambut, Metatah,
                                                Pawiwahan Lengkap</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu6">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Metatah dan Tiga Bulanan Ngileh Lesung</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu7">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Paket Metatah dan Oton Mapetik</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu8">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Pawintenan</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu10">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Metatah</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu11">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Bayuh Oton</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu12">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Otonan</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu15">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Magedong-gedongan</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu16">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Nutug Kambuhan</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#menu17">
                                <div class="product-list">
                                    <div class="product-list-img">
                                    </div>
                                    <div class="product-list-info">
                                        <div class="product-list-info-table">
                                            <p>Sudhiwidani, Meras Nak Alit</p>
                                        </div>
                                    </div>
                                </div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!-- product area end -->
    <!-- sell area start -->
    <section class="ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title">
                        <h2>Yuk lihat upacara yang paling sering dilakukan.</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia veritatis et adipisci
                            consectetur est ipsum id quibusdam culpa voluptates iure!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="sell-area owl-carousel">
                        {{-- <div class="sell-item">
                            <a class="product-img example-image-link" href="{{ asset('assets/masyarakat/assets/img/katalog/bayuhotonsapuleger.jpg') }}" data-lightbox="example-set" data-title="image gallery">
                                <div class="product-gallery-item max-width-360">
                                    <div class="product-gallery-overlay">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </a>
                        </div> --}}
                        <div class="sell-item">
                            <div class="product-img">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/upacara/bayuh-rare.jpg') }}"
                                    data-lightbox="example-set" data-title="Bayuh Rare">
                                    <img src="{{ asset('assets/masyarakat/assets/img/upacara/bayuh-rare.jpg') }}"
                                        alt="" style="width: 233px; height: 194px;">
                                    <div class="product-img-overlay">
                                    </div>
                            </div>
                            </a>
                            <p><a>Bayuh Rare</a></p>
                        </div>
                        <div class="sell-item">
                            <div class="product-img">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/upacara/bayuh-oton.jpg') }}"
                                    data-lightbox="example-set" data-title="Bayuh Oton">
                                    <img src="{{ asset('assets/masyarakat/assets/img/upacara/bayuh-oton.jpg') }}"
                                        alt="" style="width: 233px; height: 194px;">
                                    <div class="product-img-overlay">
                                    </div>
                            </div>
                            </a>
                            <p><a>Bayuh Oton</a></p>
                        </div>
                        <div class="sell-item">
                            <div class="product-img">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/upacara/mapetik.jpg') }}"
                                    data-lightbox="example-set" data-title="Mapetik">
                                    <img src="{{ asset('assets/masyarakat/assets/img/upacara/mapetik.jpg') }}"
                                        alt="" style="width: 233px; height: 194px;">
                                    <div class="product-img-overlay">
                                    </div>
                            </div>
                            </a>
                            <p><a>Mapetik</a></p>
                        </div>
                        <div class="sell-item">
                            <div class="product-img">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/upacara/nutug-kambuhan.jpg') }}"
                                    data-lightbox="example-set" data-title="Nutug Kambuhan">
                                    <img src="{{ asset('assets/masyarakat/assets/img/upacara/nutug-kambuhan.jpg') }}"
                                        alt="" style="width: 233px; height: 194px;">
                                    <div class="product-img-overlay">
                                    </div>
                            </div>
                            </a>
                            <p><a>Nutug Kambuhan</a></p>
                        </div>
                        <div class="sell-item">
                            <div class="product-img">
                                <a class="example-image-link"
                                    href="{{ asset('assets/masyarakat/assets/img/upacara/ngileh-lesung.jpg') }}"
                                    data-lightbox="example-set" data-title="Ngileh Lesung">
                                    <img src="{{ asset('assets/masyarakat/assets/img/upacara/ngileh-lesung.jpg') }}"
                                        alt="" style="width: 233px; height: 194px;">
                                    <div class="product-img-overlay">
                                    </div>
                            </div>
                            </a>
                            <p><a>Ngileh Lesung</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- sell area end -->
@endsection

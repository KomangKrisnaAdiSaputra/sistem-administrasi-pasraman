<!-- header area start -->
<style>
    .logo img{
       width: 200px;  
       height: auto;
    }
</style>
<header class="header-area ptb-15">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="header-left-content">
                    <ul>
                        <li><a href="https://api.whatsapp.com/send?phone=+6281907840384&text=Om Swastyastu" target="_blank"><i class="fa fa-phone"></i>+62 819 0784 0384</a></li>
                        <li><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=pesramangriyagedewayahanburuan@gmail.com&su=Pemesanan&body=" target="_blank"><i class="fa fa-envelope"></i>pesramangriyagedewayahanburuan@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header><!-- header area end -->

    <!-- menu area start -->
    <div class="menubar">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <div class="logo">
                        <a href="{{ route('masyarakat.index') }}"><img src="{{ asset('assets/images/logo/logopasraman.png') }}"
                                alt="logo"></a>
                    </div>
                </div>
                <div class="col-md-10 col-sm-6">
                    <div class="responsive-menu"></div>
                    <div class="mainmenu">
                        <ul id="primary-menu">
                            <li class="@yield('aktif.index')"><a href="{{ route('masyarakat.index') }}">Beranda</a></li>
                            <li class="@yield('aktif.about')"><a href="{{ route('masyarakat.about') }}">Tentang Kami</a></li>
                            <li class="@yield('aktif.pages')"><a href="#">Halaman<i class="fa fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('masyarakat.faq') }}">FAQ</a></li>
                                    <li><a href="{{ route('masyarakat.gallery') }}">Galeri</a></li>
                                </ul>
                            </li>
                            <li @yield('aktif.contactus')><a href="{{ route('masyarakat.contact') }}">Kontak</a></li>
                            <li>
                                <button type="submit" class="toggle-pade">
                                    <i class="fa fa-search"></i>
                                </button>
                                <form class="navbar-form form-box" role="search">
                                    <input type="text" placeholder="Search">
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- menu area end -->
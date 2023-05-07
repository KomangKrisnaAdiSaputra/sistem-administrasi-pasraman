@extends('layouts.appmasyarakat')
@section('container.isi')
@section('aktif.gallery', 'active')

<!-- hero area start -->
<section class="theme2 theme4 hero-area ptb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="hero-area-content">
                    <h1 class="text-uppercase">Galeri Acara</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae cupiditate pariatur quisquam
                        facilis suscipit aliquam. Eaque suscipit animi quia ratione culpa nisi illo temporibus
                        architecto.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section><!-- hero area end -->
<!-- product gallery area start -->
<div class="product-gallery ptb-80">
    <div class="container">
        <div class="row product-item">
            @foreach ($data as $key => $value)
                <div class="col-lg-3 col-sm-6 new other">
                    <a class="" href="{{ asset('image/galeri/' . $value->foto) }}" data-lightbox="example-set"
                        data-title="{{ $value->keterangan }}">
                        <div class="product-gallery-item max-width-360"
                            style="background-image: url({{ asset('image/galeri/' . $value->foto) }})">
                            <div class="product-gallery-overlay">
                                <h4 class="text-uppercase" style="color: white;">{{ $value->nama_foto }}</h4><br>
                                <i class="fa fa-search" aria-hidden="true" title="Lihat Keterangan / Detail Foto"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</div><!-- product gallery area end -->
@endsection

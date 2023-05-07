@extends('layouts.appmasyarakat')
@section('container.isi')
@section('aktif.about', 'active')
<style>
    .krishok-btn {
        scroll-behavior: smooth;
    }
</style>
<!-- hero area start -->
<section class="hero-area theme-3 ptb-80">
    <div class="hero-area-theme-3 theme-3_1"></div>
    <div class="hero-area-theme-3 theme-3_2"></div>
    <div class="hero-area-theme-3 theme-3_3"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-sm-10">
                <div class="hero-area-content ptb-80">
                    <h1>Pasraman Griya Gede Wayahan Buruan</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, molestias dolore voluptates eum,
                        iste enim obcaecati, explicabo animi numquam tempore placeat libero aut dignissimos expedita?
                        Asperiores inventore ducimus error iusto?
                    </p>
                    <a href="#about" class="krishok-btn">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section><!-- hero area end -->
<!-- about area start -->
<section class="ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-area-content">
                    <img src="assets/masyarakat/assets/img/tentangkami.jpg" alt="about">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-area-content" id="about">
                    <h2>Tentang Kami</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit dolorem cumque distinctio
                        necessitatibus quis, reiciendis tempora sed ratione, dignissimos maxime esse nemo soluta
                        accusantium vitae quidem ea hic, tempore facilis laboriosam optio fugiat maiores! Et similique,
                        assumenda accusantium ullam id odit adipisci quidem doloribus eaque eligendi repellendus ab
                        soluta fugit quis beatae eos aliquid corrupti dolorem illum commodi optio nobis qui ea!
                        Voluptatum assumenda hic ab laboriosam vitae corrupti eum.
                    </p>
                    <a href="{{ route('masyarakat.contact') }}" class="krishok-btn scroll">Kontak Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-area-content">
                    <h2>Alur Pendaftaran dan Pelaksanaan Upacara</h2>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam in, eum qui aspernatur
                        reprehenderit natus? Ab a cumque consectetur reiciendis incidunt, sit totam molestias! Nostrum
                        vitae beatae quo voluptates! Culpa delectus est quaerat corrupti asperiores ipsam, pariatur
                        harum adipisci porro optio rerum omnis provident hic qui illum totam deleniti tempore reiciendis
                        expedita consectetur! Minima error quam adipisci recusandae dignissimos vero id, ipsum sapiente
                        ex harum cumque qui soluta, voluptatibus odio possimus. Ut optio iure at!
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-area-content">
                    <img src="assets/masyarakat/assets/img/alurpendaftaran.jpg" alt="alur">
                </div>
            </div>
        </div>
    </div>
</section><!-- about area end -->

<!-- testimonial area start -->
<section class="ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sec-title">
                    <h2>Testimoni Pengunjung</h2>
                    <p>Penilaian pengunjung terkait pelaksanaan acara di pasraman.</p>
                </div>
            </div>
        </div>
        <form action="{{ route('testimoni-masyarakat-create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 mt-30">
                    <div class="row mt-2 d-flex justify-content-center align-item-center">
                        <div class="mb-3 col-md-6 text-center">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_testimoni" name="nama_testimoni"
                                required>
                            <label class="form-label">Pesan</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="5"></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
</section>
<!-- testimonial area end -->
<!-- testimonial area start -->
<section class="ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sec-title">
                    <h2>Testimoni Pengunjung</h2>
                    <p>Penilaian pengunjung terkait pelaksanaan acara di pasraman.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-30">


                <div @if ($data->count() > 1) class="testimonial-slide owl-carousel" @endif>
                    @foreach ($data as $key => $value)
                        <div class="single-testimonial-box">
                            <h5>{{ $value->nama_testimoni }}</h5>
                            <p>{{ $value->keterangan }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial area end -->
<script>
    const aboutAnchor = document.querySelector('.krishok-btn');
    const aboutSection = document.querySelector('#about');

    aboutAnchor.addEventListener('click', (event) => {
        event.preventDefault(); // prevent the default link behavior
        aboutSection.scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>
@endsection

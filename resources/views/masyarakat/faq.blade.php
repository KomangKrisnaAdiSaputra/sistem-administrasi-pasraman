@extends('layouts.appmasyarakat')
@section('container.isi')
@section('aktif.pages', 'active')
<section class="theme2 theme5 hero-area ptb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="hero-area-content">
                    <h1 class="text-uppercase">FAQ</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio laborum aliquam molestiae minima.
                        Deleniti, quaerat ratione eveniet quisquam molestiae voluptate?
                    </p>
                </div>
            </div>
        </div>
    </div>
</section><!-- hero area end -->
<!-- faq area start -->
<section class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sec-title">
                    <h2>Berikut jawaban untuk pertanyaan yang paling sering ditanyakan.</h2>
                    <p>Yuk disimak dengan baik</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-area mt-50">
                    <div class="pannel-group" id="general-question">
                        @foreach ($data as $item)
                            <div class="card">
                                <div class="card-header">
                                    <a href="#question{{ $item->id }}" data-toggle="collapse"
                                        data-parent="#general-question" class="collapsed" aria-expanded="true">
                                        {{ ucfirst($item->pertanyaan) }}
                                    </a>
                                </div>
                                <div id="question{{ $item->id }}"
                                    class="panel-collapse @if ($loop->first) collapse show @else collapse @endif"
                                    aria-expanded="true" role="banner">
                                    <div class="card-body">
                                        <p>{{ ucfirst($item->jawaban) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>




    </div>
</section><!-- faq area end -->
@endsection

@extends('layouts.app')
@section('container.isi')
@section('footer.css', '18.5%')
@section('container.css')
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }

        .imgProfile {
            width: 13em;
            height: 10em;
            border-radius: 20%;
            margin-left: auto;
            margin-right: auto;
        }

        .black {
            color: black;
            font-weight: normal;
        }
    </style>
@endsection
<section class="row">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <img src="{{ asset('assets/images/faces/user.png') }}" alt="user" class="imgProfile" />
                            <h4 class="mt-4" style="text-align: center;">Admin</h4>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h5>Username</h5>
                                <h5 class="black">{{ auth()->user()->username }}</h5>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h5>Email</h5>
                                <h5 class="black">{{ auth()->user()->email }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-8 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <form class="form" method="POST"
                                action="{{ route('profile.update', auth()->user()->id) }}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" class="form-control"
                                                placeholder="Username" name="username"
                                                value="{{ auth()->user()->username }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control"
                                                placeholder="Email" name="email"
                                                value="{{ auth()->user()->email }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="password_baru">Password Baru </label>
                                            <!-- <span toggle="#password-field" class="bi bi-eye-slash field_icon toggle-password"></span> -->
                                            <input type="password" id="password_baru" class="form-control"
                                                name="password_baru" placeholder="Masukkan Password Baru"
                                                />
                                                <i class="bi bi-eye-slash field_icon toggle-password" id="#password-field" style="float: right; margin-top:-30px; margin-right: 10px; cursor: pointer;"></i>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="konfirmasi_password">Konfirmasi Password</label>
                                            <input type="password" id="konfirmasi_password" class="form-control"
                                                name="konfirmasi_password" placeholder="Konfirmasi Password Baru"
                                                onchange="validasiPass()" required/>
                                        </div>
                                    </div> -->
                                    <div class="col-12 d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" id="btn_profile">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</section>
{{-- <section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body mt-4">
                        <form class="form" method="POST" action="{{ route('profile.update', auth()->user()->id) }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" class="form-control" placeholder="Username"
                                            name="username" value="{{ auth()->user()->username }}" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" placeholder="Email"
                                            name="email" value="{{ auth()->user()->email }}" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <div class="col-md-3 col-12">
                                        <label for="password_lama">Password Lama</label>
                                        <div class="form-group position-relative has-icon-right">
                                            <input type="password" id="password_lama" class="form-control"
                                                name="password_lama" placeholder="Masukkan Password Lama"
                                                onchange="validasiPass()" />
                                            <div class="form-control-icon">
                                                <i class="bi bi-eye-slash mata-pass" onclick="bukaPassword()"
                                                    id="mata-pass-lama">
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <label for="password_baru">Password Baru</label>
                                        <div class="form-group position-relative has-icon-right">
                                            <input type="password" id="password_baru" class="form-control"
                                                name="password_baru" placeholder="Masukkan Password Baru"
                                                onchange="validasiPass()" />
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <label for="konfirmasi_password">Konfirmasi Password</label>
                                        <div class="form-group position-relative has-icon-right">
                                            <input type="password" id="konfirmasi_password" class="form-control"
                                                name="konfirmasi_password" placeholder="Konfirmasi Password Baru"
                                                onchange="validasiPass()" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary me-1 mb-1" id="btn_profile">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

@section('container.js')
    <script>

        $("body").on('click', '.toggle-password', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#password_baru");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

        });

        document.getElementById("konfirmasi_password").readOnly = true;

        function validasiPass() {
            var password_lama = document.getElementById('password_lama');
            var password_baru = document.getElementById('password_baru');
            var konfirmasi_password = document.getElementById('konfirmasi_password');
            var btn_profile = document.getElementById('btn_profile');
            if (password_baru.value != "") {
                document.getElementById("konfirmasi_password").readOnly = false;
            }

            if (password_lama.value != "" || password_baru.value != "" || konfirmasi_password.value != "") {
                btn_profile.disabled = true;

                if (password_baru.value != "" && konfirmasi_password.value != "") {
                    if (password_baru.value != konfirmasi_password.value) {

                        konfirmasi_password.style.borderColor = "red";
                        konfirmasi_password.placeholder = 'Password Tidak Sama!';
                        konfirmasi_password.value = "";
                        konfirmasi_password.focus();
                    } else {
                        btn_profile.disabled = false;
                    }
                }
            }
        }

        document.getElementById('konfirmasi_password').addEventListener('keyup', function() {
            this.style.borderColor = "";
        });
    </script>
@endsection
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Pasraman</title>

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}" />

</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first" style="margin-top: 5%;">
                <img src="{{ asset('image/login/pasraman.png') }}" id="icon" alt="User Icon"
                    style="width: 150px;" />
                    <h3>PASRAMAN GRIYA GEDE WAYAHAN BURUAN</h3>
            </div>
            

            <!-- Login Form -->
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email/Username">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
            </div>

        </div>
    </div>
    {{-- <div id="auth">
        <div class="kotak">
            <div class="row h-100" style="align-items: center !important; margin-left: 25% !important;">
                <div class="col-lg-8 col-12">
                    <div id="auth-left">
                        <div class="auth-logo">
                            <a href="#"><img src="assets/images/logo/logo.svg" alt="Logo" /></a>
                        </div>
                        <h1 class="auth-title">Log in.</h1>

                        <form action="{{ route('login.store') }}" method="POST">
                            @csrf
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" class="form-control form-control-xl" placeholder="Email"
                                    name="email" />
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" class="form-control form-control-xl" placeholder="Password"
                                    name="password" />
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                                Log in
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div> --}}
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/sweetalert2.js') }}"></script>
    @if (session()->has('errors'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '{{ session('errors') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
</body>

</html>

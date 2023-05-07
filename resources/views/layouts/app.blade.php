<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $data['title'] }} - Pasraman</title>

    @include('layouts.includes.css')

</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">

            @include('layouts.includes.header')

            <div class="content-wrapper container">
                <div class="page-heading">
                    <h3 id="heading_title_custom">{{ $data['title'] }}</h3>
                </div>

                <div class="page-content">

                    @yield('container.isi')

                </div>
            </div>

            {{-- MODAL TAMBAH --}}
            <div class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">

                            </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body" id="modalBodyTambah">

                        </div>
                    </div>
                </div>
            </div>

            {{-- MODAL UPDATE --}}
            <div class="modal fade text-left" id="modalUpdate" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">

                            </h4>
                            <button type="button" class="close modal-close-update" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body" id="modalBodyUpdate">

                        </div>
                    </div>
                </div>
            </div>

            {{-- MODAL DETAIL --}}
            <div class="modal fade text-left" id="modalDetail" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">

                            </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body" id="modalBodyDetail">

                        </div>
                    </div>
                </div>
            </div>

            <footer style="margin-top: @yield('footer.css')">
                <div class="container mt-7">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>{{ date('Y') }} &copy; </p>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>

    @include('layouts.includes.javascript')
</body>

</html>

@if (isset($_COOKIE['u_id']))

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <title>Karir Alfamart</title>
    </head>

    <body>

        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-my">
            <div class="container-fluid navbar-container shadow-sm">
                <a class="navbar-brand" href="https://alfamart.co.id/" target="_blank"><img
                        src="{{ asset('assets/image/Logo.png') }}" class="logo" alt="Logo Alfarmart"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end navbar-btn" id="navbarNavAltMarkup">
                    <div class="d-auth d-flex me-3 my-2">
                        @foreach ($user as $Get)
                            <button type="button" class="btn-user d-flex" onclick="ModalUser()" name="user">
                                <img class="" src="{{ asset('assets/image/Avatar.png') }}" alt="Avatar"
                                    width="25">
                                <div class="ms-3">
                                    {{ $Get['nama'] }}
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </nav>

        {{-- Content --}}
        <div class="content">

            {{-- Content --}}
            @yield('content')

            <form action="menu" method="get" name="form-menu">
                @csrf
                <div class="modal fade" id="ModalUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-body p-5">
                                @foreach ($user as $Get)
                                    <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Hello,
                                        <br><span name="nama"> {{ $Get['nama'] }}</span>
                                    </h1>
                                    <ul class="navbar-nav mt-2 mt-lg-0">
                                        <li class="nav-item active">
                                            <button class="nav-link" type="button" onclick="profile()">Profile</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" type="button" onclick="loker()">Job Vacancy</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" type="button" onclick="histori()">Histori</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" type="button" onclick="logout()">Logout</button>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            {{-- footer --}}
            <div id="aboutus">
                <div class="footer-top">
                    <div class="container">
                        <div class="row footer-list">
                            <div class="col-md-4">
                                <div class="footer-item footer-item-address">
                                    <h5 class="footer-title">PT Sumber Alfaria Trijaya, Tbk</h5>
                                    <p class="nav-link-c">
                                        SAT Building B, Jl. M. H. Thamrin No. 9, <br> Cikokol,
                                        Tangerang 15117, <br> Indonesia
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="footer-item">
                                    <h5 class="footer-title">Kontak Kami</h5>
                                    <ul class="ul-c">
                                        <li>
                                            <a class="nav-link-c">+6221 55755966 (ext. 22050)</a>
                                        </li>
                                        <li>
                                            <a class="nav-link-c"
                                                href="mailto:sat_recruit_alfaonline@sat.co.id">sat_recruit_alfaonline@sat.co.id</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="footer-item">
                                    <h5 class="footer-title">Terhubung Bersama Kami</h5>
                                    <ul class="ul-c">
                                        <li>
                                            <a class="nav-link-c" href="https://blog.alfamart.co.id/"
                                                target="_blank">Artikel</a>
                                        </li>
                                        <li>
                                            <a class="nav-link-c" href="https://alfamart.co.id/"
                                                target="_blank">Website</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom text-center mt-2">
                    <div class="container">
                        <p class="copy-right">Copyright ©️ 2023 PT Sumber Alfaria Trijaya, Tbk.</p>
                    </div>
                </div>
            </div>

        </div>

    </body>

    <!-- JS -->

    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        function logout() {
            window.location.href = "logout";
        }

        function loker() {
            window.location.href = "loker";
        }

        function profile() {
            window.location.href = "profile";
        }

        function histori() {
            window.location.href = "histori";
        }

        function ModalUser() {
            $('#ModalUser').modal('show');
        };
    </script>

    </html>

    {{-- if not login --}}
@else
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Err Login Fail</title>
    </head>

    <body>
        <div>Can't get login info: Redirect to Welcome.</div>
    </body>
    <script>
        window.onload = function() {
            window.location.href = "/";
        }
    </script>

    </html>

@endif

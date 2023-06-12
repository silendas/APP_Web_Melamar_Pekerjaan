<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <title>Karir Alfamart</title>
</head>

<body>

    <div>

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
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#loker">Job Vacancy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#aboutus">Contact Us</a>
                        </li>
                    </ul>
                    <div class="d-auth d-flex me-3 my-2">

                        <!-- Trigger Modal Login-->
                        <button type="button" class="btn btn-login" onclick="ModalLogin()">
                            Login
                        </button>

                    </div>
                </div>
            </div>
        </nav>


        {{-- Content --}}
        <div class="content" id="home">

            @if (session('errormessage'))
            <div class="alert-c bg-danger" style="margin-left: 2.5%; margin-right: 2.5%; transition: 0.4s ease-in-out;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{ session('errormessage') }}
            </div>
            @endif
            <div class="header-k mb-3">
                <img src="{{ asset('assets/image/Alfamart-home.jpg') }}" class="gambar" alt="Alfarmart">
                <div class="w-100 text-start d-block mt-2">
                    <h3 class="text-danger text-center">Waspada Penipuan !!!</h3>
                    <p class="disc">
                        Waspada terhadap penipuan yang mengatasnamakan PT Sumber Alfaria Trijaya. <br>
                        Kami hanya mencari pelamar melalui website ini, jika terdapat lowongan lain yang bukan dari
                        website ini maka dapat dipastikan lowongan tersebut adalah palsu. <br>
                        Kami tidak meminta biaya apapun dalam proses perekrutan karyawan baru, jika terdapat pelamar
                        yang tertipu pihak kami tidak bertanggung jawab atas itu.
                    </p>
                </div>
            </div>

            <div class="loker-k mt-4 d-block" id="loker">
                <h2 class="text-center text-danger mb-4">Job Vacancy</h2>
                @if (is_null($loker))
                    <div>
                        <h6 class="text-danger">Tidak ada Loker tersedia...</h6>
                    </div>
                @else
                    @foreach ($loker as $Get)
                        <div class="border shadow-sm d-block mb-2 p-3 w-100">
                            <div class="d-block">
                                <div class="d-flex">
                                    <h3>{{ $Get['posisi'] }} |</h3>
                                    <h3 class="ms-1">{{ $Get['cabang'] }}</h3>
                                </div>
                                <h6 class="mb-3">Gaji : Rp.{{ $Get['gaji'] }}</h6>
                                <textarea class="form-control bg-light mb-3" rows="10" disabled>{{ $Get['deskripsi'] }}</textarea>
                            </div>
                            <div class="d-block justify-content-center">
                                <button type="button" class="btn btn-primary" onclick="ModalLogin()">
                                    Lamar
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

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

            {{-- Modal Login --}}
            <form action="login" method="get">
                @csrf
                <div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-body p-5">
                                <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">LOGIN</h1>
                                <div class="" id="errMsg-l"></div>
                                <form class="form d-block" action="">
                                    <div class="form-group w-100 d-block mb-2">
                                        <label class="" for="">Email</label>
                                        <input class="w-100" type="email" name="email_l" id="" focus
                                            required>
                                    </div>
                                    <div class="form-group w-100 d-block mb-2">
                                        <label class="" for="" name="pass">Password</label>
                                        <input class="w-100" type="password" name="password_l" id=""
                                            required>
                                    </div>
                                    <div class="form-group d-flex">
                                        <p>
                                            Don't have account yet ?
                                        </p>
                                        <a class="nav-link-r ms-2" type="button" onclick="ModalRegister()"> Register
                                            here !</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            {{-- Modal Register --}}
            <form action="" method="post">
                @csrf
                <div class="modal fade" id="ModalRegister" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-body p-5">
                                <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">REGISTER</h1>
                                <div class="" id="errMsg"></div>
                                <form class="form d-block" action="">
                                    <div class="form-group w-100 d-block mb-2">
                                        <label class="" for="" name="">NIK</label>
                                        <input class="w-100" type="text" name="nik" id="">
                                    </div>
                                    <div class="form-group w-100 d-block mb-2">
                                        <label class="" for="">Nama</label>
                                        <input class="w-100" type="text" name="nama" id="">
                                    </div>
                                    <div class="form-group w-100 d-block mb-2">
                                        <label class="d-block" for="">Jenis Kelamin</label>
                                        <select name="jk" class="form-select i-jk" id="">
                                            <option value="L">L</option>
                                            <option value="P">P</option>
                                        </select>
                                    </div>
                                    <div class="form-group w-100 d-block mb-2">
                                        <label class="d-block" for="">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lhr" placeholder="YYYY-MM-DD" required
                                            pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                            title="Enter a date in this formart YYYY-MM-DD" />
                                    </div>
                                    <div class="form-group w-100 d-block mb-2">
                                        <label class="" for="">No Hanphone</label>
                                        <input class="w-100" type="text" name="nohp" id="">
                                    </div>
                                    <div class="form-group w-100 d-block mb-2">
                                        <label class="" for="">Alamat</label>
                                        <textarea class="w-100" type="" rows="7" name="alamat" id=""></textarea>
                                    </div>
                                    <div class="form-group w-100 d-block mb-2">
                                        <label class="" for="">Email</label>
                                        <input class="w-100" type="text" name="email" id="">
                                    </div>
                                    <div class="form-group w-100 d-block mb-2">
                                        <label class="" for="">Password</label>
                                        <input class="w-100" type="password" name="password" id="">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="btn-register"
                                            onclick="Register()">Daftar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>

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
        function ModalRegister() {
            $("#errMsg").html("");
            $('[name="nik"]').val('');
            $('[name="nama"]').val('');
            $('[name="jk"]').val('');
            $('[name="tgl_lhr"]').val('');
            $('[name="nohp"]').val('');
            $('[name="alamat"]').val('');
            $('[name="email"]').val('');
            $('[name="password"]').val('');

            $('#ModalLogin').modal('hide');

            $('#ModalRegister').modal('show');
            $('#ModalRegister').on('shown.bs.modal', function() {
                $('[name="nik"]').focus();
            });
        };

        function ModalLogin() {
            $("#errMsg-l").html("");
            $('[name="email_l"]').val('');
            $('[name="password_l"]').val('');

            $('#ModalLogin').modal('show');
            $('#ModalLogin').on('shown.bs.modal', function() {
                $('[name="email_l"]').focus();
            });
        };

        function Register() {
            $("#errMsg").html("");
            let nik = $('[name="nik"]').val();
            let nama = $('[name="nama"]').val();
            let jk = $('[name="jk"]').val();
            let tgl_lhr = $("[name='tgl_lhr']").val();;
            let nohp = $('[name="nohp"]').val();
            let alamat = $('[name="alamat"]').val();
            let email = $('[name="email"]').val();
            let pass = $('[name="password"]').val();

            $.ajax({
                method: 'POST',
                url: "{{ route('register') }}",
                data: {
                    nik: nik,
                    nama: nama,
                    jk: jk,
                    tgl_lhr: tgl_lhr,
                    nohp: nohp,
                    alamat: alamat,
                    email: email,
                    pass: pass,
                },
                success: function() {
                    $('[name="nik"]').val('');
                    $('[name="nama"]').val('');
                    $('[name="jk"]').val('');
                    $('[name="tgl_lhr"]').val('');
                    $('[name="nohp"]').val('');
                    $('[name="alamat"]').val('');
                    $('[name="email"]').val('');
                    $('[name="password"]').val('');
                    $('#errMsg').html('')
                    $('#ModalRegister').modal('hide');
                    ModalLogin()
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $('#errMsg').append('<span class="text-danger">' + value + '</span><br>')
                    });
                },
            });
        }
    </script>

    @if (isset($_COOKIE['u_id']))
        <script>
            window.onload = function() {
                window.location.href = "profile";
            }
        </script>
    @else
    @endif

</body>

</html>

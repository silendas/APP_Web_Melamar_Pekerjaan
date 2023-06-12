@extends('Layout')
@section('content')

    <div class="c-container" id="d-profile">
        @if (session('message'))
            <div class="alert-c bg-primary" style="margin-left: 2.5%; margin-right: 2.5%; transition: 0.4s ease-in-out;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{ session('message') }}
            </div>
        @endif
        <h2 class="text-center text-danger pt-3 pb-3">Profile</h2>
        <div class="shadow form-p mb-3">
            <div class="d-flex w-100">
                <div class="w-50">
                    <h3 class="text-dark">Data Diri</h3>
                </div>
                <div class="d-flex w-100 justify-content-end">
                    @if (is_null($user))
                    @else
                        @foreach ($user as $get)
                            <button class="btn btn-primary" onclick="ModalEditProfile({{ $get['nik'] }}, '{{ $get['nama'] }}', '{{ $get['jk'] }}', '{{ $get['tgl_lhr'] }}', '{{ $get['nohp'] }}', '{{ $get['alamat'] }}', '{{ $get['email'] }}', '{{ $get['password'] }}')">Perbarui</button>
                        @endforeach
                    @endif
                </div>
            </div>
            @if (is_null($user))
            @else
                @foreach ($user as $get)
                    <div class="d-block mb-2">
                        <label for=""class="mb-1 text-black">NIK</label>
                        <input class="form-control" type="text" name="p_nik" placeholder="Type NIK"
                            value="{{ $get['nik'] }}" disabled>
                    </div>
                    <div class="d-block mb-2">
                        <label for=""class="mb-1 text-black">Nama</label>
                        <input class="form-control" type="text" name="p_nama" placeholder="Type Nama"
                            value="{{ $get['nama'] }}" disabled>
                    </div>
                    <div class="d-block mb-2">
                        <label for=""class="text-black">Jenis Kelamin</label>
                        <select name="p_jk" class="form-select i-jk" id="" disabled>
                            <option value="{{ $get['jk'] }}" selected>{{ $get['jk'] }}</option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                    </div>
                    <div class="d-block mb-2">
                        <label for=""class="mb-1 text-black">Tanggal Lahir</label>
                        <input type="date" class="form-control i-date" name="p_tgl_lhr" placeholder="YYYY-MM-DD" required
                            pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="Enter a date in this formart YYYY-MM-DD"
                            value="{{ $get['tgl_lhr'] }}" disabled />
                    </div>
                    <div class="d-block mb-2">
                        <label for=""class="mb-1 text-black">No Handphone</label>
                        <input type="text" class="form-control i-date" name="p_nohp" value="{{ $get['nohp'] }}"
                            disabled>
                    </div>
                    <div class="d-block mb-2">
                        <label for=""class="mb-1 text-black">Alamat</label>
                        <textarea type="text" class="form-control" name="p_alamat" disabled>{{ $get['alamat'] }}</textarea>
                    </div>
                    <div class="d-block mb-2">
                        <label for=""class="mb-1 text-black">Email</label>
                        <input type="text" class="form-control" name="p_email" value="{{ $get['email'] }}" disabled>
                    </div>
                    <div class="d-block mb-2">
                        <label for=""class="mb-1 text-black">Password</label>
                        <input type="text" class="form-control" name="p_pass" value="{{ $get['password'] }}" disabled>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="shadow form-p mb-3">
            <div class="d-flex w-100 mb-3">
                <div class="w-50">
                    <h3 class="text-dark">Pendidikan</h3>
                </div>
                <div class="d-flex w-100 justify-content-end">
                    <button class="btn btn-primary" onclick="ModalTambahPendidikan()">Tambah</button>
                </div>
            </div>
            @if (is_null($pendidikan))
                <div>
                    <h6 class="text-danger ms-3">Belum ada data ...</h6>
                </div>
            @else
                @foreach ($pendidikan as $Get)
                    <div class="border shadow-sm d-card mb-2 p-3" id="pnddkn">
                        <div class="d-block w-100">
                            <h5>{{ $Get['sekolah'] }}</h5>
                            <h5 class="mb-1">{{ $Get['jurusan'] }}</h5>
                            <label class="mb-1">Nilai/IPK : {{ $Get['nilai'] }}</label>
                            <div class="d-flex align-items-center">
                                <label for="" class="mb-1">Tahun Kelulusan : {{ $Get['thn_lulus'] }}</label>
                            </div>
                        </div>
                        <div class="btn-crud">
                            <div class="d-block justify-content-center">
                                <button class="btn btn-warning btn-w btn-gap"
                                    onclick="ModalEditPendidikan({{ $Get['id_pendidikan'] }}, '{{ $Get['sekolah'] }}', '{{ $Get['jurusan'] }}', {{ $Get['nilai'] }}, '{{ $Get['thn_lulus'] }}')">Edit</button>
                                <button class="btn btn-danger btn-w"
                                    onclick="ModalHapusPendidikan({{ $Get['id_pendidikan'] }})">Delete</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div id="pnglmn" class="shadow form-p">
            <div class="d-flex w-100 mb-3">
                <div class="w-50">
                    <h3 class="text-dark">Pengalaman Kerja</h3>
                </div>
                <div class="d-flex w-100 justify-content-end">
                    <button class="btn btn-primary" onclick="ModalTambahPengalaman()">Tambah</button>
                </div>
            </div>
            @if (is_null($pengalaman))
                <div>
                    <h6 class="text-danger ms-3">Belum ada data ...</h6>
                </div>
            @else
                @foreach ($pengalaman as $Get)
                    <div class="border shadow-sm d-card mb-2 p-3">
                        <div class="d-block w-100 me-5">
                            <h5>{{ $Get['perusahaan'] }}</h5>
                            <h5 class="mb-1">{{ $Get['posisi'] }}</h5>
                            <div class="d-block mb-2">
                                <div class="d-flex align-items-center mb-1">
                                    <label for="" class="me-2">Masa Bekerja :</label>
                                </div>
                                <div class="d-flex">
                                    <label for="">{{ $Get['f_date'] }} <span> Sampai </span> {{ $Get['l_date'] }}</label>
                                </div>
                            </div>
                            <div class="d-block">
                                <label for="" class="mb-1">Deskripsi :</label>
                                <textarea class="form-control bg-light mb-3" rows="5" disabled>{{ $Get['deskrpsi'] }}</textarea>
                            </div>
                        </div>
                        <div class="btn-crud mb-2">
                            <div class="d-block justify-content-center">
                                <button class="btn btn-warning btn-w btn-gap"
                                    onclick="ModalEditPengalaman({{ $Get['id_pengalaman'] }}, '{{ $Get['perusahaan'] }}', '{{ $Get['posisi'] }}', '{{ $Get['f_date'] }}', '{{ $Get['l_date'] }}', '{{ $Get['deskrpsi'] }}' )">Edit</button>
                                <button class="btn btn-danger btn-w"
                                    onclick="ModalHapusPengalaman({{ $Get['id_pengalaman'] }})">Delete</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="modal fade" id="ModalEditProfile" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="profile/perbarui" method="post">
            @csrf
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Data Diri</h1>
                        <div class="d-block mb-2">
                            <div class="d-block mb-2">
                                <label for=""class="mb-1 text-black">NIK</label>
                                <input class="form-control" type="text" name="p_nik" placeholder="Type NIK">
                            </div>
                            <div class="d-block mb-2">
                                <label for=""class="mb-1 text-black">Nama</label>
                                <input class="form-control" type="text" name="p_nama" placeholder="Type Nama">
                            </div>
                            <div class="d-block mb-2">
                                <label for=""class="text-black">Jenis Kelamin</label>
                                <select name="p_jk" class="form-select i-jk" id="">
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                            <div class="d-block mb-2">
                                <label for=""class="mb-1 text-black">Tanggal Lahir</label>
                                <input type="date" class="form-control i-date" name="p_tgl_lhr"
                                    placeholder="YYYY-MM-DD" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                    title="Enter a date in this formart YYYY-MM-DD" />
                            </div>
                            <div class="d-block mb-2">
                                <label for=""class="mb-1 text-black">No Handphone</label>
                                <input type="text" class="form-control i-date" name="p_nohp">
                            </div>
                            <div class="d-block mb-2">
                                <label for=""class="mb-1 text-black">Alamat</label>
                                <textarea type="text" class="form-control" name="p_alamat"></textarea>
                            </div>
                            <div class="d-block mb-2">
                                <label for=""class="mb-1 text-black">Email</label>
                                <input type="text" class="form-control" name="p_email">
                            </div>
                            <div class="d-block mb-2">
                                <label for=""class="mb-1 text-black">Password</label>
                                <input type="text" class="form-control" name="p_pass">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-b">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="ModalTambahPendidikan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="pendidikan/tambah" method="post">
            @csrf
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Tambah Pendidikan</h1>
                        <div class="d-block mb-2">
                            <div>
                                <label class="mb-1" for="">Sekolah</label>
                                <input type="text" name="p_sklh" class="form-control" required>
                            </div>
                            <div>
                                <label class="mb-1" for="">Jurusan</label>
                                <input type="text" name="p_jrsn" class="form-control">
                            </div>
                            <div>
                                <label class="mb-1" for="">Nilai / IPK</label>
                                <input type="text" name="p_nilai" class="form-control w-nilai" required>
                            </div>
                            <div>
                                <label class="mb-1" for="">Tahun Kelulusan</label>
                                <input type="date" class="form-control ip-date mb-1" name="p_tgl_lls"
                                    placeholder="YYYY-MM-DD" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                    title="Enter a date in this formart YYYY-MM-DD" required />
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-b">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="ModalEditPendidikan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="pendidikan/ubah" method="post">
            @csrf
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Ubah Pendidikan</h1>
                        <div class="d-block mb-2">
                            <input type="text" class="d-none" name="pe_id">
                            <div>
                                <label class="mb-1" for="">Sekolah</label>
                                <input type="text" name="pe_sklh" class="form-control" required>
                            </div>
                            <div>
                                <label class="mb-1" for="">Jurusan</label>
                                <input type="text" name="pe_jrsn" class="form-control" required>
                            </div>
                            <div>
                                <label class="mb-1" for="">Nilai / IPK</label>
                                <input type="text" name="pe_nilai" class="form-control w-nilai" required>
                            </div>
                            <div>
                                <label class="mb-1" for="">Tahun Kelulusan</label>
                                <input type="date" class="form-control ip-date mb-1" name="pe_tgl_lls"
                                    placeholder="YYYY-MM-DD" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                    title="Enter a date in this formart YYYY-MM-DD" required />
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-b">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="modal fade" id="ModalHapusPendidikan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="pendidikan/hapus" method="post">
            @csrf
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Hapus Pendidikan</h1>
                        <div id="errMsg1"></div>
                        <div class="d-block mb-2">
                            <input type="text" name="pd_id" class="d-none">
                            <div class="mb-2 w-100 d-flex jusify-content-center text-center">
                                <h4>Yakin ingin menghapusnya ?</h4>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-b">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="ModalTambahPengalaman" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="pengalaman/tambah" method="post">
            @csrf
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Tambah Pengalaman</h1>
                        <div class="d-block mb-2">
                            <div>
                                <label class="mb-1" for="">Nama Perusahaan</label>
                                <input type="text" name="p_prshaan" class="form-control" required>
                            </div>
                            <div>
                                <label class="mb-1" for="">Posisi</label>
                                <input type="text" name="p_pssi" class="form-control">
                            </div>
                            <div>
                                <label class="mb-1" for="">Awal Bekerja</label>
                                <input type="date" class="form-control ip-date mb-1"
                                    name="p_fd"placeholder="YYYY-MM-DD"
                                    pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"title="Enter a date in this formart YYYY-MM-DD"
                                    required />
                            </div>
                            <div>
                                <label class="mb-1" for="">Akhir Bekerja</label>
                                <input type="date" class="form-control ip-date mb-1" name="p_ld"
                                    placeholder="YYYY-MM-DD" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                    title="Enter a date in this formart YYYY-MM-DD" required />
                            </div>
                            <div>
                                <label class="mb-1" for="">Deskripsi Pekerjaan</label>
                                <textarea type="text" name="p_desk" class="form-control" placeholder="Deskripsikan Jobdesk yang kamu lakukan..."
                                    rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-b">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="ModalEditPengalaman" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="pengalaman/ubah" method="post">
            @csrf
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Ubah Pengalaman</h1>
                        <div class="d-block mb-2">
                            <input type="text" class="d-none" name="pe_id">
                            <div>
                                <label class="mb-1" for="">Nama Perusahaan</label>
                                <input type="text" name="pe_prshaan" class="form-control" required>
                            </div>
                            <div>
                                <label class="mb-1" for="">Posisi</label>
                                <input type="text" name="pe_pssi" class="form-control">
                            </div>
                            <div>
                                <label class="mb-1" for="">Awal Bekerja</label>
                                <input type="date" class="form-control ip-date mb-1"
                                    name="pe_fd"placeholder="YYYY-MM-DD"
                                    pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"title="Enter a date in this formart YYYY-MM-DD"
                                    required />
                            </div>
                            <div>
                                <label class="mb-1" for="">Akhir Bekerja</label>
                                <input type="date" class="form-control ip-date mb-1" name="pe_ld"
                                    placeholder="YYYY-MM-DD" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                    title="Enter a date in this formart YYYY-MM-DD" required />
                            </div>
                            <div>
                                <label class="mb-1" for="">Deskripsi Pekerjaan</label>
                                <textarea type="text" name="pe_desk" class="form-control" placeholder="Deskripsikan Jobdesk yang kamu lakukan..."
                                    rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-b">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="ModalHapusPengalaman" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="pengalaman/hapus" method="post">
            @csrf
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Hapus Pengalaman</h1>
                        <div id="errMsg1"></div>
                        <div class="d-block mb-2">
                            <input type="text" name="pd_id" class="d-none">
                            <div class="mb-2 w-100 d-flex jusify-content-center text-center">
                                <h4>Yakin ingin menghapusnya ?</h4>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-b">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function ModalEditProfile(nik, nama, jk, tgl_lhr, nohp, alamat, email, pass) {
            $('[name="p_nik"]').val(nik);
            $('[name="p_nama"]').val(nama);
            $('[name="p_jk"]').val(jk);
            $('[name="p_tgl_lhr"]').val(tgl_lhr);
            $('[name="p_nohp"]').val(nohp);
            $('[name="p_alamat"]').val(alamat);
            $('[name="p_email"]').val(email);
            $('[name="p_pass"]').val(pass);


            $('#ModalEditProfile').modal('show');
            $('#ModalEditProfile').on('shown.bs.modal', function() {
                $('[name="p_nik"]').focus()
            })
        }

        function ModalTambahPendidikan() {
            $('[name="p_sklh"]').val('');
            $('[name="p_jrsn"]').val('');
            $('[name="p_nilai"]').val('');
            $('[name="p_tgl_lls"]').val('');

            $('#ModalTambahPendidikan').modal('show');
            $('#ModalTambahPendidikan').on('shown.bs.modal', function() {
                $('[name="p_sklh"]').focus()
            })
        }

        function ModalTambahPengalaman() {
            $('[name="p_prshaan"]').val('');
            $('[name="p_pssi"]').val('');
            $('[name="p_fd"]').val('');
            $('[name="p_ld"]').val('');
            $('[name="p_desk"]').val('');
            $('#ModalTambahPengalaman').modal('show');
            $('#ModalTambahPengalaman').on('shown.bs.modal', function() {
                $('[name="p_prshaan"]').focus()
            })
        }

        function ModalEditPendidikan(id, sklh, jrsn, nilai, tgl) {
            $('[name="pe_id"]').val(id);
            $('[name="pe_sklh"]').val(sklh);
            $('[name="pe_jrsn"]').val(jrsn);
            $('[name="pe_nilai"]').val(nilai);
            $('[name="pe_tgl_lls"]').val(tgl);

            console.log(id + sklh + jrsn)

            $('#ModalEditPendidikan').modal('show');
            $('#ModalEditPendidikan').on('shown.bs.modal', function() {
                $('[name="pe_sklh"]').focus()
            })
        }

        function ModalEditPengalaman(id, prshn, pss, fd, ld, desk) {
            $('[name="pe_id"]').val(id);
            $('[name="pe_prshaan"]').val(prshn);
            $('[name="pe_pssi"]').val(pss);
            $('[name="pe_fd"]').val(fd);
            $('[name="pe_ld"]').val(ld);
            $('[name="pe_desk"]').val(desk);

            $('#ModalEditPengalaman').modal('show');
            $('#ModalEditPengalaman').on('shown.bs.modal', function() {
                $('[name="pe_prshaan"]').focus()
            })
        }

        function ModalHapusPendidikan(id) {
            $('[name="pd_id"]').val(id);

            console.log(id)

            $('#ModalHapusPendidikan').modal('show');
        }

        function ModalHapusPengalaman(id) {
            $('[name="pd_id"]').val(id);

            console.log(id)

            $('#ModalHapusPengalaman').modal('show');
        }
    </script>
@endsection

@extends('Layout')
@section('content')

    <div class="loker-k d-block" id="d-histori">
        @if (session('message'))
            <div class="alert-c bg-primary" style="margin-left: 2.5%; margin-right: 2.5%; transition: 0.4s ease-in-out;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{ session('message') }}
            </div>
        @endif
        <h2 class="text-center text-danger pt-3 pb-3">Histori</h2>
        <div class="list-histori">
            @if (is_null($melamar))
                <div>
                    <h6 class="text-danger">Anda belum melamar pekerjaan, silahkan ke Job Vacancy untuk melamar pekerjaan
                    </h6>
                </div>
            @else
                @foreach ($melamar as $get)
                    <div class="border histori shadow-sm d-block mb-2 p-3" style="cursor:pointer;"
                        onclick="DetailInfo('{{ $get['kualifikasi'] }}', '{{ $get['id_melamar'] }}', '{{ $get['posisi'] }}')">
                        <div class="d-flex">
                            <div class="d-block w-100">
                                <div class="d-block">
                                    <h5>{{ $get['posisi'] }}</h5>
                                    <h5>{{ $get['cabang'] }}</h5>
                                </div>
                                <div>
                                    <h6 class="text">Tanggal Melamar :</h6>
                                    <h6>{{ $get['tgl_melamar'] }}</h6>
                                </div>
                            </div>
                            <div class="stts d-block justify-content-center">
                                <label for="" class="ms-2 me-2">Status :</label>
                                <button type="button" class=" btn-kuali">{{ $get['kualifikasi'] }}</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="modal fade" id="ModalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Informasi</h1>
                        <div id="errMsg1"></div>
                        <div class="d-block mb-2">
                            <div class="mb-2 w-100 d-flex jusify-content-center text-center">
                                <h6 id="info"></h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-b">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<form action="test" method="GET">
    <div class="modal fade" id="ModalTest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Informasi</h1>
                    <div id="errMsg1"></div>
                    <div class="d-block mb-2">
                        <input type="text" name="r_idmlmr" class="d-none" />
                        <input type="text" name="r_posisi" class="d-none" />
                        <div class="mb-2 w-100 d-flex jusify-content-center text-center">
                            <h6>Anda akan mengikuti test untuk posisi yang anda pilih, ingin melakukan test sekarang ?</h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-b">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

    <script>
        function DetailInfo(kualifikasi, id_melamar, posisi) {
            var info = document.getElementById('info')

            if (kualifikasi == "Administrasi") {
                info.innerHTML =
                    "Anda sedang dalam proses Administrasi. <br> HR sedang mengecek kelayakan persyaratan profile anda."
                $('#ModalInfo').modal('show');
            } else if (kualifikasi == "Interview") {
                info.innerHTML =
                    "Anda sedang dalam proses Interview Online. <br> Silahkan bergabung kedalam grup seleksi interview berikut : <br> <a href='https://chat.whatsapp.com/EZLH3fzYMtT0iVxgZl9uDu'>Klik link untuk bergabung</a>."
                $('#ModalInfo').modal('show');
            } else if (kualifikasi == "Gagal") {
                info.innerHTML =
                    "Mohon maaf anda tidak lolos dalam seleksi penerimaan karyawan saat ini, anda dapat melamar lowongan yang lainnya"
                $('#ModalInfo').modal('show');
            } else if (kualifikasi == "Lolos") {
                info.innerHTML =
                    "Selamat anda lolos seleksi karyawan. <br> Selanjutnya anda akan melakukan training di pusat PT Sumber Alfaria Trijaya, silahkan bergabung dengan grup lolos seleksi untuk informasi lebih lanjut : <br> <a href='https://chat.whatsapp.com/EZLH3fzYMtT0iVxgZl9uDu'>Klik link untuk bergabung</a>."
                $('#ModalInfo').modal('show');
            } else if (kualifikasi == "Test") {
                $('[name="r_idmlmr"]').val(id_melamar);
                $('[name="r_posisi"]').val(posisi);
                $('#ModalTest').modal('show');
            }

        }

        function close() {
            $('#ModalInfo').modal('hide')
        }
    </script>

@endsection

@extends('Layout')
@section('content')

    <div class="loker-k d-block" id="d-loker">
        @if (session('message'))
            <div class="alert-c bg-primary" style="margin-left: 2.5%; margin-right: 2.5%; transition: 0.4s ease-in-out;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{ session('message') }}
            </div>
        @endif
        <h2 class="text-center text-danger mb-2">Job Vacancy</h2>
        <form action="search" method="get">
            @csrf
            <div class="filter d-block justify-content-center mb-3">
                <div class="mb-2">
                    <h5>Cabang</h5>
                    <select name="p_cbng" class="form-select" id="">
                        @if (is_null($cabang))
                            <option selected>-- Kosong --</option>
                        @else
                            <option selected>-- Pilih Cabang --</option>
                            @foreach ($cabang as $cabang)
                                <option value="{{ $cabang['l_cabang'] }}">{{ $cabang['l_cabang'] }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" id="fltr-loker">Search</button>
                </div>
            </div>
        </form>
        <div id="list-loker">
            @if (is_null($loker))
                <div>
                    <h6 class="text-danger">Tidak ada Loker tersedia...</h6>
                </div>
            @else
                @foreach ($loker as $Get)
                    <div class="border shadow-sm d-block mb-2 p-3">
                        <div class="d-block">
                            <div class="d-flex">
                                <h3>{{ $Get['posisi'] }} |</h3>
                                <h3 class="ms-1">{{ $Get['cabang'] }}</h3>
                            </div>
                            <h6 class="mb-2">Gaji : Rp.{{ $Get['gaji'] }}</h6>
                            <h6 class="mb-3">Tanggal Publish : {{ $Get['tgl_pblsh'] }}</h6>
                            <h6>Deskripsi :</h6>
                            <textarea class="form-control bg-light mb-3" rows="10" disabled>{{ $Get['deskripsi'] }}</textarea>
                        </div>
                        <div class="d-block justify-content-center">
                            <button type="button" class="btn btn-primary" onclick="ModalMelamar({{$Get['id_loker']}})">Lamar</button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="modal fade" id="ModalMelamar" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="melamar" method="post">
            @csrf
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Melamar</h1>
                        <div id="errMsg1"></div>
                        <div class="d-block mb-2">
                            <input type="text" name="pd_id" class="d-none"/>
                            <div class="mb-2 w-100 d-flex jusify-content-center text-center">
                                <h6>Konfirmasi untuk melamar pekerjaan.</h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-b">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Lamar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        
        function ModalMelamar(id) {
            $('[name="pd_id"]').val(id);

            console.log(id)

            $('#ModalMelamar').modal('show');
        }
    </script>

@endsection

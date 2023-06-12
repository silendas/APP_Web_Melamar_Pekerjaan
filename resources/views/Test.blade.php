@extends('Layout')
@section('content')
    <div class="container mb-3">
        <div class="shadow-sm bg-white p-3 text-center">
            <h4 class="mb-0">TEST</h4>
            <h4 class="mt-0">{{ $posisi }}</h4>
        </div>
        <div class="shadow bg-white p-3">
            @if (is_null($test))
                <div>
                    <h6 class="text-danger">Test belum tersedia..
                    </h6>
                </div>
            @else
                <?php $num = 1; ?>
                @foreach ($test as $get)
                    <div class="f mb-2">
                        <div>
                            <label for="">{{ $num }}. </label>
                            <label for="">{{ $get['pertanyaan'] }}</label>
                        </div>
                        <div style="display: block">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="a{{ $get['id_test'] }}"
                                    name="pg{{ $get['id_test'] }}" value="a">
                                <label class="form-check-label" for="'a'{{ $get['id_test'] }}">a.
                                    {{ $get['a'] }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="b{{ $get['id_test'] }}"
                                    name="pg{{ $get['id_test'] }}" value="b">
                                <label class="form-check-label" for="'b'{{ $get['id_test'] }}">b.
                                    {{ $get['b'] }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="a{{ $get['id_test'] }}"
                                    name="pg{{ $get['id_test'] }}" value="c">
                                <label class="form-check-label" for="'b'{{ $get['id_test'] }}">c.
                                    {{ $get['c'] }}</label>
                            </div>
                        </div>
                    </div>
                    <?php $num = $num + 1; ?>
                @endforeach
                <div>
                    <button type="button" class="btn btn-primary" onclick="check()">Selesai</button>
                </div>
            @endif
        </div>
        <div class="modal fade" id="ModalTest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="nilai" method="POST">
                @csrf
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">Test</h1>
                            <div id="errMsg1"></div>
                            <div class="d-block mb-2">
                                <input type="text" name="id_melamar" value="{{$id_melamar}}" class="d-none">
                                <input type="text" id="score" name="score" class="d-none">
                                <div class="mb-2 w-100 d-flex jusify-content-center text-center">
                                    <h4>Sudah yakin dengan jawaban anda?, jika belum silahkan periksa kembali.</h4>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-b">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Yakin</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function check() {
            var benar = 0;
            var jum = 0;
            var score = 0;
            @if (is_null($test))
            @else
                @foreach ($test as $get)
                    var jawaban = '{{ $get['jawaban'] }}';
                    var pg{{ $get['id_test'] }} = document.querySelector('input[name="pg{{ $get['id_test'] }}"]:checked').value;

                    if (pg{{ $get['id_test'] }} == jawaban) {
                        benar = benar + 1;
                    }

                    jum = jum + 1;
                @endforeach
            @endif

            score = (benar / jum) * 100;
            document.getElementById('score').value = score;
            $('#ModalTest').modal('show');
        }
    </script>
@endsection

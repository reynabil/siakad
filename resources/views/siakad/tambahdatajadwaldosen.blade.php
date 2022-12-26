@extends('layout.main')


@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>CRUD LARAVEL</title>
    </head>

    <body>
        <h1 class="text-center mb-4">Tambah Data Jadwal </h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertdatajadwaldosen" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="id_matkul" class="form-label">MATKUL</label>
                                    @error('matkul')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <select class="form-select" name="id_matkul" aria-label="Default select example"
                                        id="id_matkul">
                                        <option value=""></option>

                                        @foreach ($matkul as $mat)
                                            <option value="{{ $mat->id }}" data-kode="{{ $mat->kode_matkul }}">
                                                {{ $mat->matkul }} </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3 mt-3">
                                    <label for="kode_matkul" class="form-label">KODE MATKUL</label>
                                    <input type="number" readonly class="form-control" name="kode_matkul" id="kode"
                                        aria-describedby="emailHelp">
                                </div>
                                @error('kode_matkul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror


                                <div class="mb-3 mt-3">
                                    <label for="id_namadosen" class="form-label">NAMA DOSEN</label>
                                    <select class="form-select" id="id_namadosen"
                                        name="id_namadosen"aria-label="Default select example">
                                        <option value=""></option>

                                        @foreach ($dosen as $d)
                                            <option value="{{ $d->id }}" data-nip="{{ $d->nip }}">
                                                {{ $d->nama_dosen }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="number" readonly class="form-control" name="nip" id="nip"
                                        aria-describedby="emailHelp">
                                </div>
                                @error('nip')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div class="mb-3 mt-3">
                                    <label for="koderuang" class="form-label">KODE RUANG</label>
                                    <select class="form-select" id="koderuang"
                                        name="koderuang"aria-label="Default select example">
                                        <option value=""></option>

                                        @foreach ($ruang as $r)
                                            <option value="{{ $r->id }}">
                                                {{ $r->kode_ruang }} </option>
                                        @endforeach
                                    </select>
                                </div>




                                <div class="mb-3 mt-3">
                                    <label for="waktu" class="form-label">WAKTU</label>
                                    <input type="text" class="form-control" name="waktu" id="waktu"
                                        aria-describedby="emailHelp">
                                </div>
                                @error('waktu')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script>
            const matkul = document.getElementById('id_matkul')
            matkul.onchange = function(e) {
                const kode = e.target.options[e.target.selectedIndex].dataset.kode
                document.getElementById('kode').value = kode;
            }
        </script>

        <script>
            const dosen = document.getElementById('id_namadosen')
            dosen.onchange = function(e) {
                const nip = e.target.options[e.target.selectedIndex].dataset.nip
                document.getElementById('nip').value = nip;
            }
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                                    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
                                </script>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                                    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
                                </script>
                                -->
    </body>

    </html>
@endsection

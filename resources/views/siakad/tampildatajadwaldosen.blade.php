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
        <h1 class="text-center mb-4">Edit Data Jadwal </h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updatedatajadwaldosen/{{$data->id}}" method="POST" enctype="multipart/form-data">
                                @csrf



                                <div class="mb-3 mt-3">
                                    <label for="id_matkul" class="form-label">MATKUL</label>
                                    <select class="form-select" name="id_matkul" id="id_matkul"
                                        aria-label="Default select example">
                                        <option value="{{ $data->matkuls->matkul }}" <?php if ($data->matkul == '') {
                                            echo 'selected';
                                        } ?>>{{ $data->matkul }}
                                        </option>
                                        @foreach ($matkul as $mat)
                                            <option value="{{ $mat->id }}" data-kode_matkul="{{ $mat->kode_matkul }}"
                                                <?php if ($data->matkuls->id == $mat->id) {
                                                    echo 'selected';
                                                } ?>>{{ $mat->matkul }} </option>
                                        @endforeach
                                    </select>
                                </div>


                                @error('id_matkul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="">
                                    <label for="kode_matkul" class="form-label">KODE MATKUL</label>
                                    <input type="number" readonly class="form-control" name="kode_matkul" id="kode_matkul"
                                        aria-describedby="emailHelp" value="{{ $data->kode_matkul }}">
                                </div>
                                @error('kode_matkul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror



                                <div class="mb-3 mt-3">
                                    <label for="id_namadosen" class="form-label">Nama Dosen</label>
                                    <select class="form-select" name="id_namadosen" id="id_namadosen"
                                        aria-label="Default select example">
                                        <option value="{{ $data->dosens->nama_dosen }}" <?php if ($data->nama_dosen == '') {
                                            echo 'selected';
                                        } ?>></option>
                                        @foreach ($dosen as $d)
                                            <option value="{{ $d->id }}" data-nip="{{ $d->nip }}"
                                                <?php if ($data->dosens->id == $d->id) {
                                                    echo 'selected';
                                                } ?>>{{ $d->nama_dosen }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('id_namadosen')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror


                                <div class="mb-3 mt-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="number" readonly class="form-control" name="nip" id="nip"
                                        aria-describedby="emailHelp" value="{{ $data->nip }}">
                                </div>
                                @error('nip')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div class="mb-3 mt-3">
                                    <label for="koderuang" class="form-label">KODE RUANG</label>
                                    <select class="form-select" name="koderuang" id="koderuang"
                                        aria-label="Default select example">
                                        <option value="{{ $data->ruangs->kode_ruang }}"<?php if ($data->kode_ruang == '') {
                                            echo 'selected';
                                        } ?>>
                                            {{ $data->kode_ruang }}
                                        </option>
                                        @foreach ($ruang as $r)
                                            <option value="{{ $r->id }}" <?php if ($data->ruangs->id == $r->id) {
                                                echo 'selected';
                                            } ?>>
                                                {{ $r->kode_ruang }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('koderuang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror


                                <div class="mb-3">
                                    <label for="nama" class="form-label">ALAMAT</label>
                                    <input type="text" class="form-control" name="waktu" id="waktu"
                                        aria-describedby="emailHelp" value="{{ $data->waktu }}">
                                </div>
                                @error('waktu')
                                    <div class="text_danger">{{ $message }}</div>
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
                const kode_matkul = e.target.options[e.target.selectedIndex].dataset.kode_matkul
                document.getElementById('kode_matkul').value = kode_matkul;
            }
        </script>

        <script>
            const seleksi = document.getElementById('id_namadosen')
            seleksi.onchange = function(e) {
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

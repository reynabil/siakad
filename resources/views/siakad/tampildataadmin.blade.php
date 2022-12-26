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
        <h1 class="text-center mb-4">Edit Data Mahasiswa</h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updatedataadmin/{{ $data->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="number" readonly class="form-control" name="nim" id="nim"
                                        aria-describedby="emailHelp" value="{{ $data->nim }}">
                                </div>
                                @error('nim')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror


                                <div class="">
                                    <label for="nama" class="form-label">NAMA</label>
                                    <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa"
                                        aria-describedby="emailHelp" value="{{ $data->nama_mahasiswa }}">
                                </div>
                                @error('nama_mahasiswa')
                                    <div class="text-danger"> {{ $message }}</div>
                                @enderror
                                <br>


                                <div class="">
                                    <label for="jeniskelamin" class="form-label">JENIS KELAMIN</label>
                                    <br>
                                    @error('jeniskelamin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <input class="" type="radio" value="laki-laki" name="jeniskelamin"
                                        id="jeniskelamin"<?php if ($data['jeniskelamin'] == 'laki-laki') {
                                            echo 'checked';
                                        } ?>>
                                    <label class="" for="jeniskelamin">
                                        laki-laki
                                    </label>
                                </div>
                                <div class="">
                                    <input class="" type="radio" value="perempuan" name="jeniskelamin"
                                        id="jeniskelamin" <?php if ($data['jeniskelamin'] == 'perempuan') {
                                            echo 'checked';
                                        } ?>>
                                    <label class="" for="jeniskelamin">
                                        Perempuan
                                    </label>
                                </div>


                                <div class="mb-3">
                                    <label for="nama" class="form-label">ALAMAT</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat"
                                        aria-describedby="emailHelp" value="{{ $data->alamat }}">
                                </div>
                                @error('alamat')
                                    <div class="text_danger">{{ $message }}</div>
                                @enderror


                                <div class="mb-3">
                                    <label for="foto" class="form-label"></label>
                                    <img class="img mb-3" src="{{ asset('fotomahasiswa/' . $data->foto) }}" alt=""
                                        style="width: 90px;">
                                    <input type="file" class="form-label" name="foto">
                                </div>
                                @error('foto')
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

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
        <h1 class="text-center mb-4">Tambah Data JURUSAN</h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertdatajurusan" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="nim" class="form-label">KODE JURUSAN</label>
                                    <input type="number" class="form-control" name="kode_jurusan" id="kode_jurusan"
                                        aria-describedby="emailHelp">
                                </div>
                                @error('kode_jurusan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror


                                <div class="mb-3 mt-3">
                                    <label for="matkul" class="form-label">Jurusan</label>
                                    @error('jurusan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <select class="form-select" name="jurusan" aria-label="Default select example">
                                        <option disabled selected>--Pilih Jurusan--</option>
                                        <option value="INFORMATIKA">INFORMATIKA</option>
                                        <option value="SASTRA JEPANG">SASTRA JEPANG</option>
                                        <option value="ELEKTRONIKA">ELEKTRONIKA</option>
                                    </select>
                                </div>
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

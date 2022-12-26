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
        <h1 class="text-center mb-4">Edit Data Jadwal Mahasiswa </h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertdatajadwaldosen" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="hari" class="form-label">Hari</label>
                                    <select class="form-select" name="hari" aria-label="Default select example">
                                        <option disabled selected>-{{$data->hari}}-</option>
                                        <option value="senin">senin</option>
                                        <option value="selasa">selasa</option>
                                        <option value="rabu">rabu</option>
                                        <option value="kamis">kamis</option>
                                        <option value="jumat">jumat</option>
                                        <option value="sabtu">sabtu</option>
                                    </select>
                                </div>
                                @error('hari')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div class="mb-3 mt-3">
                                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                    <input type="time" class="form-control" name="jam_mulai" id="jam_mulai"
                                        aria-describedby="emailHelp" value="{{$data->jam_mulai}}">
                                        @error('jam_mulai')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                    <input type="time" class="form-control" name="jam_selesai" id="jam_selesai"
                                        aria-describedby="emailHelp" value="{{$data->jam_selesai}}">
                                        @error('jam_selesai')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="dosens_id" class="form-label">Nama Dosen</label>
                                    <select class="form-select" name="dosens_id" id="dosens_id"
                                        aria-label="Default select example">
                                        <option value="" <?php if ($data->dosens_id == '') {
                                            echo 'selected';
                                        } ?>></option>
                                            @foreach ($dosen as $d)
                                        <option value="{{ $d->id }}" <?php if ($data->dosens_id == $d->id) {
                                            echo 'selected';
                                        } ?>>{{ $d->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('dosens_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror



                                <div class="mb-3 mt-3">
                                    <label for="matkul" class="form-label">Matkul</label>
                                    @error('matkul')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <select class="form-select" name="matkul" aria-label="Default select example">
                                        <option disabled selected>{{ $data->matkul }}</option>
                                        <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                                        <option value="TEKNIK ELEKTRONIKA">TEKNIK ELEKTRONIKA</option>
                                    </select>
                                </div>
                                @error('matkul')
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

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
        <h1 class="text-center mb-4">Edit Data Khs</h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updatedatakhs/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 mt-3">
                                    <label for="nama_mahasiswa" class="form-label">NAMA MAHASISWA</label>
                                    <select class="form-select" name="id_namamahasiswa" id="nama"
                                        aria-label="Default select example">
                                        <option value="{{ $data->nama_mahasiswa }}" <?php if ($data->nama_mahasiswa == '') {
                                            echo 'selected';
                                        } ?>></option>
                                        @foreach ($mahasiswa as $mhs)
                                            <option value="{{ $mhs->id }}" data-nim="{{ $mhs->nim }}"
                                                <?php if ($data->mahasiswas->id == $mhs->id) {
                                                    echo 'selected';
                                                } ?>>{{ $mhs->nama_mahasiswa }} </option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('nama_mahasiswa')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="number" readonly class="form-control" name="nim" id="nim"
                                        aria-describedby="emailHelp" value="{{ $data->nim }}">
                                </div>
                                @error('nim')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror


                                <div class="mb-3 mt-3">
                                    <label for="id_matkul" class="form-label">MATKUL</label>
                                    <select class="form-select" name="id_matkul" id="id_matkul"
                                        aria-label="Default select example">
                                        <option value="{{ $data->matkul }}" <?php if ($data->matkul == '') {
                                            echo 'selected';
                                        } ?>>{{ $data->matkul }}</option>
                                        @foreach ($matkul as $mat)
                                            <option value="{{ $mat->id }}" data-kode_matkul="{{ $mat->kode_matkul }}"
                                                <?php if ($data->matkuls->id == $mat->id) {
                                                    echo 'selected';
                                                } ?>>{{ $mat->matkul }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('matkul')
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
                                    <label for="nama" class="form-label">NIILAI</label>
                                    <input type="number" class="form-control" name="nilai" id="nilai"
                                        aria-describedby="emailHelp" value="{{$data->nilai}}">
                                </div>
                                @error('niai')
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
            const seleksi = document.getElementById('nama')
            seleksi.onchange = function(e) {
                const nim = e.target.options[e.target.selectedIndex].dataset.nim
                document.getElementById('nim').value = nim;
            }
        </script>
        <script>
            const matkul = document.getElementById('matkul')
            matkul.onchange = function(e) {
                const kode_matkul = e.target.options[e.target.selectedIndex].dataset.kode_matkul
                document.getElementById('kode_matkul').value = kode_matkul;
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

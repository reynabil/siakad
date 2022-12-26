<?php

namespace App\Http\Controllers;

use App\Models\krs;
use App\Models\admin;
use App\Models\jurusan;
use App\Models\matkul;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function krs()
    {
        // $data = krs::with('mahasiswa', 'matkul');
        $data = Krs::all();
        return view('siakad.krs', compact('data'));
    }
    public function tambahdatakrs()
    {
        $mahasiswa = admin::all();
        $matkul = matkul::all();
        $jurusan = jurusan::all();
        return view('siakad.tambahdatakrs', compact('mahasiswa','matkul','jurusan'));
    }
    public function insertdatakrs(Request $request)
    {
        $this->validate($request, [
            'id_namamahasiswa' => 'required',
            'nim' => 'required',
            'id_matkul' => 'required',
            'kode_matkul' => 'required',
            'id_jurusan' => 'required',
            'kode_jurusan' => 'required',
        ], [
            'id_namamahasiswa.required' => 'Harus Diisi',
            'nim.required' => 'Harus Diisi',
            'id_matkul.required' => 'Harus Diisi',
            'kode_matkul.required' => 'Harus Diisi',
            'id_jurusan.required' => 'Harus Diisi',
            'kode_jurusan.required' => 'Harus Diisi',
        ]);
        $data = krs::create([
            'id_namamahasiswa' => $request->id_namamahasiswa,
            'nim' => $request->nim,
            'id_matkul' => $request->id_matkul,
            'kode_matkul' => $request->kode_matkul,
            'id_jurusan' => $request->id_jurusan,
            'kode_jurusan' => $request->kode_jurusan,
        ]);
        return redirect()->route('krs')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function tampildatakrs($id)
    {
        $mahasiswa = admin::all();
        $matkul = matkul::all();
        $jurusan = jurusan::all();
        $data = krs::find($id);
        return view('siakad.tampildatakrs', compact('data','matkul','mahasiswa','jurusan'));
    }
    public function updatedatakrs(request $request, $id)
    {
        $data = krs::find($id);
        $data->update([
            'id_namamahasiswa' => $request->id_namamahasiswa,
            'nim' => $request->nim,
            'id_matkul' => $request->id_matkul,
            'kode_matkul' => $request->kode_matkul,
            'id_jurusan' => $request->id_jurusan,
            'kode_jurusan' => $request->kode_jurusan,
        ]);
        return redirect()->route('krs')->with('success', 'Data Berhasil Di Update');
    }
    public function deletekrs($id)
    {
        $data = krs::find($id);
        $data->delete();
        return redirect()->route('krs')->with('success', 'Data Berhasil Di Delete');
    }
}

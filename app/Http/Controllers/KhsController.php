<?php

namespace App\Http\Controllers;

use App\Models\khs;
use App\Models\admin;
use App\Models\matkul;
use Illuminate\Http\Request;

class KhsController extends Controller
{
    public function khs()
    {
        $data = khs::all();
        return view('siakad.khs', compact('data'));
    }
    public function tambahdatakhs()
    {
        $mahasiswa = admin::all();
        $matkul = matkul::all();
        return view('siakad.tambahdatakhs', compact('mahasiswa', 'matkul'));
    }
    public function insertdatakhs(Request $request)
    {
        $this->validate($request, [
            'id_namamahasiswa' => 'required',
            'nim' => 'required',
            'id_matkul' => 'required',
            'kode_matkul' => 'required',
            'nilai' => 'required',
        ], [
            'id_namamahasiswa.required' => 'Harus Diisi',
            'nim.required' => 'Harus Diisi',
            'id_matkul.required' => 'Harus Diisi',
            'kode_matkul.required' => 'Harus Diisi',
            'nilai.required' => 'Harus Diisi',
        ]);
        $data = khs::create([
            'id_namamahasiswa' => $request->id_namamahasiswa,
            'nim' => $request->nim,
            'id_matkul' => $request->id_matkul,
            'kode_matkul' => $request->kode_matkul,
            'nilai' => $request->nilai,
        ]);
        return redirect()->route('khs')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function tampildatakhs($id)
    {
        $mahasiswa = admin::all();
        $matkul = matkul::all();
        $data = khs::findOrfail($id);
        return view('siakad.tampildatakhs', compact('data','mahasiswa','matkul'));
    }
    public function updatedatakhs(request $request, $id)
    {
        $data = khs::find($id);
        $data->update([
            'id_namamahasiswa' => $request->id_namamahasiswa,
            'nim' => $request->nim,
            'id_matkul' => $request->id_matkul,
            'kode_matkul' => $request->kode_matkul,
            'nilai' => $request->nilai,
        ]);
        return redirect()->route('khs')->with('success', 'Data Berhasil Di Update');
    }
    public function deletekhs($id)
    {
        $data = khs::find($id);
        $data->delete();
        return redirect()->route('khs')->with('success', 'Data Berhasil Di Delete');
    }
}

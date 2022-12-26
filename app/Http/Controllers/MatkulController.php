<?php

namespace App\Http\Controllers;

use App\Models\khs;
use App\Models\krs;
use App\Models\dosen;
use App\Models\matkul;
use App\Models\jadwaldosen;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function matkul()
    {
        $data = matkul::all();
        return view('siakad.matkul', compact('data'));
    }
    public function tambahdatamatkul()
    {
        return view('siakad.tambahdatamatkul');
    }
    public function insertdatamatkul(Request $request)
    {
        $this->validate($request, [
            'kode_matkul' => 'required',
            'matkul' => 'required',
            'sks' => 'required',
        ], [
            'kode_matkul.required' => 'Harus Diisi',
            'matkul.required' => 'Harus Diisi',
            'sks.required' => 'Harus Diisi',
        ]);
        $data = matkul::create([
            'kode_matkul' => $request->kode_matkul,
            'matkul' => $request->matkul,
            'sks' => $request->sks,
        ]);
        return redirect()->route('matkul')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function tampildatamatkul($id)
    {
        $data = matkul::find($id);
        return view('siakad.tampildatamatkul', compact('data'));
    }
    public function updatedatamatkul(request $request, $id)
    {
        $data = matkul::find($id);
        $data->update([
            'kode_matkul' => $request->kode_matkul,
            'matkul' => $request->matkul,
            'sks' => $request->sks,
        ]);
        return redirect()->route('matkul')->with('success', 'Data Berhasil Di Update');
    }
    public function deletematkol($id)
    {
        $count = krs::where('id_matkul', $id)->count();
        if ($count > 0) {
            return back()->with('gagal', 'Negara masih digunakan!');
        }
        $count = khs::where('id_matkul', $id)->count();
        if ($count > 0) {
            return back()->with('gagal', 'Negara masih digunakan!');
        }
        $count = jadwaldosen::where('id_matkul', $id)->count();
        if ($count > 0) {
            return back()->with('gagal', 'Negara masih digunakan!');
        }

        $data = matkul::findorfail($id);
        $data->delete();
        return back()->with('info', 'Data berhasil dihapus');
        // $data = matkul::find($id);
        // $data->delete();
        // return redirect()->route('matkul')->with('success', 'Data Berhasil Di Delete');
    }
}

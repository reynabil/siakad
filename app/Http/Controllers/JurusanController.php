<?php

namespace App\Http\Controllers;

use App\Models\krs;
use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function jurusan()
    {
        $data = jurusan::all();
        return view('siakad.jurusan', compact('data'));
    }
    public function tambahdatajurusan()
    {
        return view('siakad.tambahdatajurusan');
    }
    public function insertdatajurusan(Request $request)
    {
        $this->validate($request,[
            'kode_jurusan'=>'required',
            'jurusan'=>'required',
        ],[
            'kode_jurusan.required' =>'Harus Diisi',
            'jurusan.required'=>'Harus Diisi',
        ]);
        $data = jurusan::create([
            'kode_jurusan'=>$request->kode_jurusan,
            'jurusan'=>$request->jurusan,
        ]);
        return redirect()->route('jurusan')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function tampildatajurusan($id)
    {
        $data = jurusan::findOrfail($id);
        return view('siakad.tampildatajurusan',compact('data'));
    }
    public function updatedatajurusan(request $request, $id)
    {
        $data = jurusan::find($id);
        $data->update([
            'kode_jurusan'=>$request->kode_jurusan,
            'jurusan'=>$request->jurusan,
        ]);
        return redirect()->route('jurusan')->with('success', 'Data Berhasil Di Update');
    }
    public function deletejurusan($id)
    {
        $count = krs::where('id_jurusan', $id)->count();
        if ($count > 0) {
            return back()->with('gagal', 'Data masih digunakan!');
        }

        $data = jurusan::findorfail($id);
        $data->delete();
        return back()->with('info', 'Data berhasil dihapus');
        // $data = jurusan::find($id);
        // $data->delete();
        // return redirect()->route('jurusan')->with('success', 'Data Berhasil Di Delete');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ruang;
use App\Models\jadwaldosen;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function ruang()
    {
        $data = ruang::all();
        return view('siakad.ruang', compact('data'));
    }
    public function tambahdataruang()
    {


        return view('siakad.tambahdataruang');
    }
    public function insertdataruang(Request $request)
    {
        $this->validate($request,[
            'kode_ruang'=>'required',
        ],[
            'kode_ruang.required' =>'Harus Diisi',
        ]);
        $data = ruang::create([
            'kode_ruang'=>$request->kode_ruang,
        ]);
        return redirect()->route('ruang')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function tampildataruang($id)
    {
        $data = ruang::find($id);
        return view('siakad.tampildataruang', compact('data'));
    }
    public function updatedataruang(request $request, $id)
    {
        $data = ruang::find($id);
        $data->update([
            'kode_ruang'=>$request->kode_ruang,
        ]);
        return redirect()->route('ruang')->with('success', 'Data Berhasil Di Update');
    }
    public function deleteruang($id)
    {
        $count = jadwaldosen::where('koderuang', $id)->count();
        if ($count > 0) {
            return back()->with('gagal', 'Negara masih digunakan!');
        }

        $data = ruang::findorfail($id);
        $data->delete();
        return back()->with('info', 'Data berhasil dihapus');

        // $data = ruang::find($id);
        // $data->delete();
        // return redirect()->route('ruang')->with('success', 'Data Berhasil Di Delete');
    }
}

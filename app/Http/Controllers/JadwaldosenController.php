<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\ruang;
use App\Models\matkul;
use App\Models\jadwaldosen;
use Illuminate\Http\Request;

class JadwaldosenController extends Controller
{
    public function jadwaldosen()
    {
        $data = jadwaldosen::all();
        return view('siakad.jadwaldosen', compact('data'));
    }
    public function tambahdatajadwaldosen()
    {
        $matkul = matkul::all();
        $dosen = dosen::all();
        $ruang = ruang::all();
        return view('siakad.tambahdatajadwaldosen', compact('dosen','matkul','ruang'));
    }
    public function insertdatajadwaldosen(Request $request)
    {
        $this->validate($request,[
            'id_matkul'=>'required',
            'kode_matkul'=>'required',
            'id_namadosen'=>'required',
            'nip'=>'required',
            'koderuang'=>'required',
            'waktu'=>'required',
        ],[
            'id_matkul.required' =>'Harus Diisi',
            'kode_matkul.required'=>'Harus Diisi',
            'id_namadosen.required'=>'Harus Diisi',
            'nip.required'=>'Harus Diisi',
            'koderuang.required'=>'Harus Diisi',
            'waktu.required'=>'Harus Diisi',
        ]);
        $data = jadwaldosen::create([
            'id_matkul'=>$request->id_matkul,
            'kode_matkul'=>$request->kode_matkul,
            'id_namadosen'=>$request->id_namadosen,
            'nip'=>$request->nip,
            'koderuang'=>$request->koderuang,
            'waktu'=>$request->waktu,
        ]);
        // if ($request->hasFile('foto')) {
        //     $request->file('foto')->move('fotodosen/', $request->file('foto')->getClientOriginalName());
        //     $data->foto = $request->file('foto')->getClientOriginalName();
        //     $data->save();
        // }
        return redirect()->route('jadwaldosen')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function tampildatajadwaldosen($id)
    {
        $dosen = dosen::all();
        $matkul = matkul::all();
        $ruang = ruang::all();
        $data = jadwaldosen::find($id);
        return view('siakad.tampildatajadwaldosen', compact('data','dosen','matkul','ruang'));
    }
    public function updatedatajadwaldosen(request $request, $id)
    {
        $data = jadwaldosen::find($id);
        $data->update([
            'id_matkul'=>$request->id_matkul,
            'kode_matkul'=>$request->kode_matkul,
            'id_namadosen'=>$request->id_namadosen,
            'nip'=>$request->nip,
            'koderuang'=>$request->koderuang,
            'waktu'=>$request->waktu,
        ]);
        return redirect()->route('jadwaldosen')->with('success', 'Data Berhasil Di Update');
    }
    public function deletejadwaldosen($id)
    {
        $data = jadwaldosen::find($id);
        $data->delete();
        return redirect()->route('jadwaldosen')->with('success', 'Data Berhasil Di Delete');
    }
}

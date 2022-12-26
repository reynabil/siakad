<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\jadwalmahasiswa;
use Illuminate\Http\Request;

class JadwalmahasiswaController extends Controller
{
    public function jadwalmahasiswa()
    {
        $data = jadwalmahasiswa::with('dosen')->get();
        return view('siakad.jadwalmahasiswa', compact('data'));
    }
    public function tambahdatajadwalmahasiswa()
    {
        $dosen = dosen::all();
        return view('siakad.tambahdatajadwalmahasiswa', compact('dosen'));
    }
    public function submitdata1(Request $request)
    {
        $this->validate($request,[
            'hari'=>'required',
            'jam_mulai'=>'required',
            'jam_selesai'=>'required',
            'matkul'=>'required',
            'dosens_id'=>'required',
        ],[
            'hari.required' =>'Harus Diisi',
            'jam_mulai.required'=>'Harus Diisi',
            'jam_selesai.required'=>'Harus Diisi',
            'matkul.required'=>'Harus Diisi',
            'dosens_id.required'=>'Harus Diisi',
        ]);
        $data = jadwalmahasiswa::create([
            'hari'=>$request->hari,
            'jam_mulai'=>$request->jam_mulai,
            'jam_selesai'=>$request->jam_selesai,
            'matkul'=>$request->matkul,
            'dosens_id'=>$request->dosens_id,
        ]);
        // if ($request->hasFile('foto')) {
        //     $request->file('foto')->move('fotodosen/', $request->file('foto')->getClientOriginalName());
        //     $data->foto = $request->file('foto')->getClientOriginalName();
        //     $data->save();
        // }
        return redirect()->route('jadwalmahasiswa')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function editjadwalmhs($id)
    {
        $dosen = dosen::all();
        $data = jadwalmahasiswa::findOrFail($id);
        return view('siakad.jadwaldose', compact('data','dosen'));
    }
    public function updatedatajadwalmahasiswa(request $request, $id)
    {
        $data = jadwalmahasiswa::find($id);
        $data->update([
            'hari'=>$request->hari,
            'jam_,ulai'=>$request->kode_jam_selesai,
            'jam_selesai'=>$request->jam_selesai,
            'matkul'=>$request->matkul,
            'nama_dosen'=>$request->nama_dosen,
        ]);
        return redirect()->route('jadwalmahasiswa')->with('success', 'Data Berhasil Di Update');
    }
    public function deletejadwalmahasiswa($id)
    {
        $data = jadwalmahasiswa::find($id);
        $data->delete();
        return redirect()->route('jadwalmahasiswa')->with('success', 'Data Berhasil Di Delete');
    }
}

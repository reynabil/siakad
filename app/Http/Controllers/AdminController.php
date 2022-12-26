<?php

namespace App\Http\Controllers;

use App\Models\khs;
use App\Models\krs;
use App\Models\admin;
use App\Models\jurusan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = admin::all();
        return view('siakad.admin', compact('data'));
    }
    public function tambahdataadmin()
    {
        $jurusan = jurusan::all();
        return view('siakad.tambahdataadmin',compact('jurusan'));
    }
    public function insertdataadmin(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'foto' => 'required',
            'jurusan' => 'required',
        ], [
            'nim.required' => 'Harus Diisi',
            'nama_mahasiswa.required' => 'Harus Diisi',
            'jeniskelamin.required' => 'Harus Diisi',
            'alamat.required' => 'Harus Diisi',
            'foto.required' => 'Harus Diisi',
            'jurusan.required' => 'Harus Diisi',
        ]);
        $data = admin::create([
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'jeniskelamin' => $request->jeniskelamin,
            'alamat' => $request->alamat,
            'foto' => $request->foto,
            'jurusan' => $request->jurusan,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotomahasiswa/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('admin')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function tampildataadmin($id)
    {
        $data = admin::find($id);
        return view('siakad.tampildataadmin', compact('data'));
    }
    public function updatedataadmin(request $request, $id)
    {
        $data = admin::find($id);
        $data->update([
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'jeniskelamin' => $request->jeniskelamin,
            'alamat' => $request->alamat,
            'foto' => $request->foto,
            'jurusan' => $request->jurusan,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotomahasiswa/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('admin')->with('success', 'Data Berhasil Di Update');
    }
    public function deleteadmin($id)
    {
        $count = krs::where('id_namamahasiswa', $id)->count();
        if ($count > 0) {
            return back()->with('gagal', 'Data masih digunakan!');
        }
        $count = khs::where('id_namamahasiswa', $id)->count();
        if ($count > 0) {
            return back()->with('gagal', 'Data masih digunakan!');
        }

        $data = admin::findorfail($id);
        $data->delete();
        return back()->with('info', 'Data berhasil dihapus');


        // $data = admin::find($id);
        // $data->delete();
        // return redirect()->route('admin')->with('success', 'Data Berhasil Di Delete');
    }
}

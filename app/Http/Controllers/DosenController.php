<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\jadwaldosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function dosen()
    {
        $data = dosen::all();
        return view('siakad.dosen', compact('data'));
    }
    public function tambahdatadosen()
    {
        return view('siakad.tambahdatadosen');
    }
    public function insertdatadosen(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'nama_dosen' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'foto' => 'required',
        ], [
            'nip.required' => 'Harus Diisi',
            'nama_dosen.required' => 'Harus Diisi',
            'jeniskelamin.required' => 'Harus Diisi',
            'alamat.required' => 'Harus Diisi',
            'foto.required' => 'Harus Diisi',
        ]);
        $data = dosen::create([
            'nip' => $request->nip,
            'nama_dosen' => $request->nama_dosen,
            'jeniskelamin' => $request->jeniskelamin,
            'alamat' => $request->alamat,
            'foto' => $request->foto,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotodosen/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('dosen')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function tampildatadosen($id)
    {
        $data = dosen::findOrfail($id);
        return view('siakad.tampildatadosen', compact('data'));
    }
    public function updatedatadosen(request $request, $id)
    {
        $data = dosen::find($id);
        $data->update([
            'nip' => $request->nip,
            'nama_dosen' => $request->nama_dosen,
            'jeniskelamin' => $request->jeniskelamin,
            'alamat' => $request->alamat,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotodosen/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('dosen')->with('success', 'Data Berhasil Di Update');
    }
    public function deletedosen($id)
    {
        $count = jadwaldosen::where('id_namadosen', $id)->count();
        if ($count > 0) {
            return back()->with('gagal', 'Data masih digunakan!');
        }

        $data = dosen::findorfail($id);
        $data->delete();
        return back()->with('info', 'Data berhasil dihapus');

        // $data = dosen::find($id);
        // $data->delete();
        // return redirect()->route('dosen')->with('success', 'Data Berhasil Di Delete');
    }
}

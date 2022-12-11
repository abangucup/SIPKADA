<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahans = Kelurahan::all();
        return view('admin.kelurahan.index', compact(['kelurahans']));
    }

    public function create()
    {
        return view('admin.kelurahan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'lokasi' => 'required'
        ]);

        $cek_nama = Kelurahan::where('nama', $request->nama)->first();
        if ($cek_nama) {
            toast('Kelurahan ' . $request->nama . ' Sudah Ada', 'info');
            return back();
        }

        $kelurahan = new Kelurahan();
        $kelurahan->nama = $request->nama;
        $kelurahan->lokasi = $request->lokasi;
        $kelurahan->save();

        toast('Kelurahan ' . $request->nama . ' Berhasil Ditambahkan', 'success');
        return to_route('kelurahan.index');
    }

    public function edit(Kelurahan $kelurahan)
    {
        return view('admin.kelurahan.edit', compact('kelurahan'));
    }

    public function update(Request $request, Kelurahan $kelurahan)
    {
        $this->validate($request, [
            'lokasi' => 'required'
        ]);

        if ($request->nama != $kelurahan->nama) {
            $validate = Validator::make($request->all(), [
                'nama' => 'required|unique:kelurahans',
            ]);

            if ($validate->fails()) {
                toast('Kelurahan ' . $request->nama . ' Sudah Ada', 'info');
                return back();
            }
        }

        $kelurahan->update([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
        ]);

        toast('Kelurahan ' . $kelurahan->nama . ' Berhasil DiEdit', 'success');
        return to_route('kelurahan.index');
    }

    public function destroy(Kelurahan $kelurahan)
    {
        $kelurahan->delete();
        toast('kelurahan ' . $kelurahan->nama . ' Berhasil Dihapus', 'success');
        return back();
    }
}

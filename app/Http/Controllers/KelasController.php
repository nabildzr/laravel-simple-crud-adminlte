<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data['result'] = Kelas::all();
        return  view('kelas/index')->with($data);
    }

    public function create()
    {
        return view('kelas/form');
    }

    public function store(Request $request)
    {

        // $request->validate([
        //     'nama_kelas' => 'required|string|max:255',
        // ]);

        $rules = [
            'nama_kelas' => 'required|max:100',
            'jurusan' => 'required|max:100'
        ];

        $request->validate($rules);
        // $this->validate($request, $ruel)

        $input = $request->all();

        $status = Kelas::create($input);

        if ($status) return redirect('/')->with('success', 'Data berhasil ditambahkan!');
        else return redirect('/')->with('error', 'Data gagal ditambahkan!');
    }

    public function edit($id)
    {
        $data['result'] = Kelas::where('id_kelas', $id)->first();
        return view('kelas/form')->with($data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_kelas' => 'required|max:100',
            'jurusan' => 'required|max:100',
        ];
        $request->validate($rules);

        $input = $request->all();
        $result = Kelas::where('id_kelas', $id)->first();
        print($result);
        $status = $result->update($input);

        if ($status) {
            return redirect('/')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy(Request $request, $id)
    {
        $result = Kelas::where('id_kelas', $id)->first();
        $status = $result->delete();


        if ($status) {
            return redirect('/')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/')->with('error', 'Data gagal diubah');
        }
    }
}

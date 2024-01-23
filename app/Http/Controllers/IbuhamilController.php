<?php

namespace App\Http\Controllers;

use App\Models\ibuhamil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IbuhamilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($request->has('search')) {
            $ibuhamil = ibuhamil::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $ibuhamil = ibuhamil::orderBy('id', 'desc')->paginate(5);
        }
        return view('ibuhamil.index')->with([
            'user' => $user, 'ibuhamil' => $ibuhamil
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('ibuhamil.create')->with(['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => "required",
            'no' => 'required',
            'alamat' => 'required',
        ], [
            'alamat.required' => 'alamat harus diisi',
            'nama.required' => 'nama balita harus diisi',
            'no.required' => 'No telepon harus diisi'

        ]);
        ibuhamil::create([
            'nama' => $request->nama,
            'no' => $request->no,
            'alamat' => $request->alamat
        ]);
        return redirect('/ibuhamil')->with('success', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $ibuhamil = ibuhamil::find($id);
        return view('ibuhamil.edit')->with(['ibuhamil' => $ibuhamil, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => "required",
            'no' => 'required',
            'alamat' => 'required',
        ], [
            'alamat.required' => 'alamat harus diisi',
            'nama.required' => 'nama balita harus diisi',
            'no.required' => 'No telepon harus diisi'

        ]);

        $ibuhamil = ibuhamil::findOrFail($id);
        $ibuhamil->update([
            'nama' => $request->nama,
            'no' => $request->no,
            'alamat' => $request->alamat
        ]);
        return redirect('/ibuhamil')->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ibuhamil::where('id', $id)->delete();
        return redirect()->route('ibuhamil.index')->with('success', 'Berhasil Hapus data');
    }
}

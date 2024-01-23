<?php

namespace App\Http\Controllers;

use App\Models\ibuhamil;
use App\Models\kesehatanibu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class kesehatanibuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $kesehatanibu = kesehatanibu::with('ibuhamil')->paginate(5);
        return view('kesehatanibu.index')->with(['user' => $user, 'kesehatanibu' => $kesehatanibu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $ibuhamil = ibuhamil::all();
        return view('kesehatanibu.create')->with(['user' => $user, 'ibuhamil' => $ibuhamil ]);
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
            'ibuhamil_id' => "required",
            'lila' => 'required',
            'bb' => 'required',
            'lingkarperut' => 'required',
            'tanggal' => 'required',
        ], [
            'ibuhamil_id.required' => 'nama ibu hamil harus diisi',
            'bb.required' => 'berat badan harus diisi',
            'lila.required' => 'lingkar lengan harus diisi',
            'lingkarperut.required' => 'Lingkar perut diisi',
            'tanggal.required' => 'tanggal harus diisi',

        ]);
        kesehatanibu::create([
            'ibuhamil_id' => $request->ibuhamil_id,
            'bb' => $request->bb,
            'lila' => $request->lila,
            'lingkarperut' => $request->lingkarperut,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/kesehatanibu')->with('success', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $kesehatanibu = kesehatanibu::find($id);
        $ibuhamil = ibuhamil::all();
        return view('kesehatanibu.edit')->with(['kesehatanibu' => $kesehatanibu, 'user' => $user, 'ibuhamil' => $ibuhamil]);
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
            'ibuhamil_id' => "required",
            'lila' => 'required',
            'bb' => 'required',
            'lingkarperut' => 'required',
            'tanggal' => 'required',
        ], [
            'ibuhamil_id.required' => 'nama ibu hamil harus diisi',
            'bb.required' => 'berat badan harus diisi',
            'lila.required' => 'lingkar lengan harus diisi',
            'lingkarperut.required' => 'Lingkar perut diisi',
            'tanggal.required' => 'tanggal harus diisi',

        ]);
        $kesehatanibu = kesehatanibu::findOrFail($id);
        $kesehatanibu->update([
            'ibuhamil_id' => $request->ibuhamil_id,
            'bb' => $request->bb,
            'lila' => $request->lila,
            'lingkarperut' => $request->lingkarperut,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/kesehatanibu')->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kesehatanibu::where('id', $id)->delete();
        return redirect()->route('kesehatanibu.index')->with('success', 'Berhasil Hapus data');
    }
}

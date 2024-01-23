<?php

namespace App\Http\Controllers;

use App\Models\balita;
use App\Models\imunisasi;
use App\Models\vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class ImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $imunisasi = imunisasi::with('vaksin', 'balita')->paginate(5);
        return view('imunisasi.index')->with(['user' => $user, 'imunisasi' => $imunisasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $vaksin = vaksin::all();
        $balita = balita::all();
        return view('imunisasi.create')->with(['user' => $user, 'vaksin' => $vaksin, 'balita' => $balita]);
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
            'balita_id' => "required",
            'vaksin_id' => 'required',
            'tanggal' => 'required',
        ], [
            'tanggal.required' => 'tanggal harus diisi',
            'balita_id.required' => 'nama balita harus diisi',
            'vaksin_id.required' => 'jenis vaksin harus diisi'

        ]);
        imunisasi::create([
            'balita_id' => $request->balita_id,
            'vaksin_id' => $request->vaksin_id,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/imunisasi')->with('success', 'berhasil menambahkan data');
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
        $vaksin = vaksin::all();
        $balita = balita::all();
        $imunisasi = imunisasi::find($id);
        return view('imunisasi.edit')->with(['imunisasi' => $imunisasi, 'user' => $user, 'balita' => $balita, 'vaksin' => $vaksin]);
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
            'balita_id' => "required",
            'vaksin_id' => 'required',
            'tanggal' => 'required',
        ], [
            'tanggal.required' => 'tanggal harus diisi',
            'balita_id.required' => 'nama balita harus diisi',
            'vaksin_id.required' => 'jenis vaksin harus diisi'

        ]);

        $imunisasi = imunisasi::findOrFail($id);

        $imunisasi->update([
            'balita_id' => $request->balita_id,
            'vaksin_id' => $request->vaksin_id,
            'tanggal' => $request->tanggal
        ]);

        return redirect('/imunisasi')->with('success', 'Berhasil update data'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        imunisasi::where('id', $id)->delete();
        return redirect()->route('imunisasi.index')->with('success', 'Berhasil Hapus data');
    }
}

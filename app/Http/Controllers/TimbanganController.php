<?php

namespace App\Http\Controllers;

use App\Models\balita;
use App\Models\timbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timbangan= timbangan::with( 'balita')->paginate(5);
        $user = Auth::user();
        return view('timbangan.index')->with(['user' => $user, 'timbangan' => $timbangan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $balita = balita::all();
        return view('timbangan.create')->with(['user' => $user, 'balita' => $balita]);
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
            'lingkarkepala' => 'required',
            'bb' => 'required',
            'tb' => 'required',
            'tanggal' => 'required',
        ], [
            'balita_id.required' => 'nama balita harus diisi',
            'bb.required' => 'berat badan harus diisi',
            'lingkarkepala.required' => 'lingkar kepala harus diisi',
            'tb.required' => 'tinggi badan harus diisi',
            'tanggal.required' => 'tanggal harus diisi',

        ]);
        timbangan::create([
            'balita_id' => $request->balita_id,
            'bb' => $request->bb,
            'lingkarkepala' => $request->lingkarkepala,
            'tb' => $request->tb,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/timbangan')->with('success', 'berhasil menambahkan data');
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
        $timbangan = timbangan::find($id);
        $balita = balita::all();
        return view('timbangan.edit')->with(['timbangan' => $timbangan, 'user' => $user, 'balita' => $balita]);
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
            'lingkarkepala' => 'required',
            'bb' => 'required',
            'tb' => 'required',
            'tanggal' => 'required',
        ], [
            'balita_id.required' => 'nama balita harus diisi',
            'bb.required' => 'berat badan harus diisi',
            'lingkarkepala.required' => 'lingkar kepala harus diisi',
            'tb.required' => 'tinggi badan harus diisi',
            'tanggal.required' => 'tanggal harus diisi',

        ]);
        $timbangan = timbangan::findOrFail($id);
        $timbangan->update([
            'balita_id' => $request->balita_id,
            'bb' => $request->bb,
            'lingkarkepala' => $request->lingkarkepala,
            'tb' => $request->tb,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/timbangan')->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        timbangan::where('id', $id)->delete();
        return redirect()->route('timbangan.index')->with('success', 'Berhasil Hapus data');
    }
}

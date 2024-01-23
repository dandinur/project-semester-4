<?php

namespace App\Http\Controllers;

use App\Models\balita;
use App\Models\User;
use App\Models\vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if($request->has('search')){
            $balita = balita::where('nama_balita', 'LIKE', '%' .$request->search. '%')->paginate(5);
        }else {
            $balita = balita::orderBy('id', 'desc')->paginate(5);
        }
        return view('balita.index')->with([
            'user' => $user, 'balita' => $balita]);
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
        return view('balita.create')->with([
            'user' => $user, 'vaksin' => $vaksin
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {
        $request->validate([
            'nama_balita' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ],
        [
            'nama_balita.required' => 'nama balita harus diisi',
            'tanggal_lahir.required' => 'tanggal lahir harus diisi',
            'jenis_kelamin.required' => 'jenis kelamin harus diisi'
        ]);
        $data= [
            'nama_balita' =>$request->nama_balita,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ];
        balita::create($data);
        return redirect('/balita')->with('success', 'Berhasil menambahkan data ');
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
        $balita = balita::find($id);
        return view('balita.edit')->with(['balita' => $balita, 'user' => $user]);
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
            'nama_balita' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ],
        [
            'nama_balita.required' => 'nama balita harus diisi',
            'tanggal_lahir.required' => 'tanggal lahir harus diisi',
            'jenis_kelamin.required' => 'jenis kelamin harus diisi'
        ]);

        $balita = balita::findOrFail($id);

        $balita->update([
            'nama_balita' => $request->nama_balita,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
       
        return redirect('/balita')->with('success', 'Berhasil update data');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        balita::where('id', $id)->delete();
        return redirect()->route('balita.index')->with('success', 'Berhasil Hapus data');
    }
}

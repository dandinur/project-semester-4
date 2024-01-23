<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        $user = User::orderBy('id', 'desc')->paginate(5);
        return view('user.index')->with(['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('user.create')->with(['user' => $user]);
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
            'name' => "required",
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ], [
            
            'name.required' => 'nama harus diisi',
            'username.required' => 'Username harus diisi',
            'password.required' => 'password harus diisi',
            'level.required' => 'level harus diisi',

        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'level' => $request->level,
        ]);
        return redirect('/user')->with('success', 'berhasil menambahkan data');
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
        $user = User::find($id);
        return  view('user.edit')->with(['user' => $user]);
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
            'name' => "required",
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ], [
            
            'name.required' => 'nama harus diisi',
            'username.required' => 'Username harus diisi',
            'password.required' => 'password harus diisi',
            'level.required' => 'level harus diisi',

        ]);
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'level' => $request->level,
        ]);
        return redirect('/user')->with('success', 'berhasil Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

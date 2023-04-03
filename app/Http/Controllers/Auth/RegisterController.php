<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class masyarakatcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('masyarakat.create');
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
            'nik' => ['required', 'string', 'unique:masyarakat'],
            'username' => ['required', 'string', 'unique:masyarakat'],
            'nama' => ['required', 'string', 'max:255'],
            'telepon'=>['required','numeric'],
            'password' => ['required', 'string', 'min:8'],
    
       ]);
        try{
            $masyarakat = new Masyarakat;
            $masyarakat->nik = $request->nik;
            $masyarakat->username = $request->username;
            $masyarakat->nama= $request->nama;
            $masyarakat->telepon=$request->telepon;
            $masyarakat->password = Hash::make($request->password);
            $masyarakat->save();
       }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['Data gagal disimpan']);
       }
        return redirect('user')->with('status','Data Berhasil ditambahkan');
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
        $masyarakat =  Masyarakat::find($id);
        return view('masyarakat.edit')->with('masyarakat',$masyarakat);
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
        //
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
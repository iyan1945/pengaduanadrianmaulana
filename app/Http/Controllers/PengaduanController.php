<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\pengaduan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;

class PengaduanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pengaduans = pengaduan::all();
       return view('pengaduan.index', ['pengaduans' => $pengaduans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pengaduan.create');
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
            'tgl_pengaduan' => ['required', 'date'],
            'isi_laporan' => ['required', 'string'],
            'status' => ['required',],
    ]);

    try{
        $pengaduans = new pengaduan;
        $pengaduans->tgl_pengaduan = $request->tgl_pengaduan;
        $pengaduans->isi_laporan = $request->isi_laporan;
        $pengaduans->status= $request->status;
        $pengaduans->save();
    }
    catch(\exception $e){
        return redirect()->back()->with('errors','pengaduan gagal ditambahkan');
    }
    return view('pengaduan.index')->with('status','pengaduan berhasil ditambahkan ');
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
        $pengaduan= pengaduan::find($id);
        return view('pengaduan.edit')->with('pengaduan',$pengaduan);   
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
            'tgl_pengaduan' => ['required', 'date'],
            'isi_laporan' => ['required', 'string'],
            'status' => ['required',],
        ]);

        try{
            {
            $pengaduan = pengaduan::find($id);
            $pengaduan->isi_laporan = $request->isi_laporan;
            $pengaduan->status= $request->status;
            $pengaduan->save();
        }
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['Pengaduan gagal diperbarui']);
        }
        return redirect('pengaduan')->with('status', 'Pengaduan Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try{
            $pengaduan =Pengaduan::findOrfail($id);
            $pengaduan->delete();
         }
         catch(\Exception $e) {
             return redirect()->back()->withErros(['pengaduan gagal disimpan']);
 
         }
         return redirect()->back()->with('status','pengaduan berhasil diperbarui');
    }
}

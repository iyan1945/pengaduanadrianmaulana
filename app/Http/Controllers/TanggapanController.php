<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\tanggapan;
use App\Models\pengaduan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapan = tanggapan::all();
        $tanggapan = pengaduan::all();
        return view('tanggapan.index')->with('tanggapan',$tanggapan);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('tanggapan.create', compact('pengaduan'));
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
            'isi laporan' => ['required'],
            'tgl_tanggapan' => ['required', 'date'],
            'tanggapan' => ['required'],    
    ]);


    try{
        $tanggapan = new Tanggapans;
        $tanggapan = pengaduan::find('isi_laporan');
        $tanggapan->tgl_tanggapan = $request->tgl_tanggapan;
        $tanggapan->tanggapan = $request->tanggapan;
        $tanggapan->save();
    }
    catch(\exception $e){
        return redirect()->back()->with('errors','tanggapan gagal ditambahkan');
    }
    return redirect('tanggapan')->with('status','tanggapan berhasil ditambahkan ');
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
        $tanggapan= tanggapan::find($id);
        return view('tanggapan.edit')->with('tanggapan',$tanggapan);  
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
            'username' => ['required', 'string', 'unique:users,username,'.$id],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'telepon' => ['required', 'numeric'],
            'level' => ['required',],
        ]);


        try{
            $tanggapan = Tanggapans::find($id);
            $tanggapan->username = $request->username;
            $tanggapan->name = $request->name;
            $tanggapan->email = $request->email;
            $tanggapan->telepon = $request->telepon;
            if($request->password !=""){
                $tanggapan->password = Hash::make($request->password);
            }
            $tanggapan->level= $request->level;
            $tanggapan->save();
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['Tanggapans gagal diperbarui']);
        }
        return redirect('tanggapan')->with('status', 'Tanggapans Berhasil diperbarui');
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
            $tanggapan =Tanggapans::findOrfail($id);
            $tanggapan->delete();
         }
         catch(\Exception $e) {
             return redirect()->back()->withErros(['tanggapan gagal disimpan']);
 
         }
         return redirect()->back()->with('status','tanggapan berhasil dihapus');
    }
}

<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::all();
        return view('user.index')->with('user',$user);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('user.create');
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
            'username' => ['required', 'string', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'telepon' => ['required', 'numeric'],
            'level' => ['required',],
    ]);


    try{
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->password = Hash::make($request->password);
        $user->level=$request->level;
        $user->save();
    }
    catch(\exception $e){
        return redirect()->back()->with('errors','user gagal ditambahkan');
    }
    return redirect('user')->with('status','user berhasil ditambahkan ');
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
        $user= user::find($id);
        return view('user.edit')->with('user',$user);  
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
            $user = User::find($id);
            $user->username = $request->username;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->telepon = $request->telepon;
            if($request->password !=""){
                $user->password = Hash::make($request->password);
            }
            $user->level= $request->level;
            $user->save();
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['User gagal diperbarui']);
        }
        return redirect('user')->with('status', 'User Berhasil diperbarui');
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
            $user =User::findOrfail($id);
            $user->delete();
         }
         catch(\Exception $e) {
             return redirect()->back()->withErros(['user gagal disimpan']);
 
         }
         return redirect()->back()->with('status','user berhasil dihapus');
    }
}

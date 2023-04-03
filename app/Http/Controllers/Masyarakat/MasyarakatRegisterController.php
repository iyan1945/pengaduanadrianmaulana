<?php


namespace App\Http\Controllers\Masyarakat;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Masyarakat;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasyarakatRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function create()
    {
        return view ('auth.registermasyarakat');
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
            'username' => ['required', 'string'],
            'nama' => ['required', 'string', 'max:255'],
            'telepon'=>['required'],
            'password' => ['required', 'string', 'min:8'],
    
       ]);
        try{
            $masyarakat = new Masyarakat;
            $masyarakat->username = $request->username;
            $masyarakat->nama= $request->nama;
            $masyarakat->telepon=$request->telepon;
            $masyarakat->password = Hash::make($request->password);
            $masyarakat->save();
       }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['Data gagal disimpan']);
       }
        return redirect('/masyarakat/login')->with('status','Data Berhasil ditambahkan');
     }
}
<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;

class MasyarakatController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $masyarakat = masyarakat::all();
       return view('masyarakat.index', ['masyarakat' => $masyarakat]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Fasilitas;
use App\Pengguna;
use App\Tps;
use App\User;
use App\Role;
use App\Camat;
use App\Lurah;
use App\Akses;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['vote'] = Pengguna::where('role_id', 4)->get();
        $data['lurah'] = Lurah::all();
        $data['camat'] = Camat::all();
        $data['tps'] = Tps::all();
        $data['data'] = Fasilitas::all();
        $data['pegawai'] = Pengguna::where('role_id', '<=', 2)->get();
        if (Auth::user()->pengguna->role_id == 1 || Auth::user()->pengguna->role_id == 2 || Auth::user()->pengguna->role_id == 3 ) {
            
            if (auth::user()->pengguna->role_id == 1 && auth::user()->pengguna->akses == auth::user()->akses || auth::user()->pengguna->role_id == 2 && auth::user()->pengguna->akses == auth::user()->akses) {
                return view('admin.menu.new');
            }
            $data['status'] = Akses::where('id',4)->get();
            return view('admin.index', $data);
        }
        else if(Auth::user()->pengguna->role_id == 4){
            if (auth::user()->pengguna->pilih == Null) {
            $data['camat'] = Camat::where('status', 'ya')->orderBy('norut','asc')->get();
            $data['lurah'] = Lurah::where('status', 'ya')->where('kelurahan_id', auth::user()->pengguna->kelurahan_id)->orderBy('norut','asc')->get();
            // dd(auth::user()->pengguna->kelurahan_id);
            
            return view('vote.index', $data);
            }
            else{
                return view('vote.eror');
            }
            
        }
        else{
             abort(404);
        }
        
    }
}

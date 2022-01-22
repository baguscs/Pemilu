<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fasilitas;
use App\Desa;
use App\Paslon;
use App\Pengguna;
use App\Provinsi;
use App\Tps;
use App\User;
use App\Role;
use App\Akses;
use App\Kelurahan;
use App\Camat;
use App\Lurah;
use App\Mail\PemiluEmail;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{

    public function tambah_fasilitas()
    {
        $status = Akses::where('id',4)->get();
        foreach ($status as $p) {
        
        if ($p->status == "tutup") {
            return view('admin.menu.fasilitas.notfound');
        } else {
            return view('admin.menu.fasilitas.tambah');
        }
        }
    	
    }

    public function profil()
    {
    	// $data['user'] = User::find($id);
    	// $data['pengguna'] = Pengguna::find($id);
    	return view('admin.menu.profil.index');
    }

    public function pass()
    {
        return view('admin.menu.profil.pass');
    }

    public function vote()
    {
        $data['status'] = Akses::where('id',1)->get();
        $data['kota'] = Desa::all();
        $data['data'] = Pengguna::where('role_id',4)->get();
        return view('admin.menu.vote.index', $data);
    }

    public function petugas()
    {
        $data['lurah'] = Kelurahan::all();
        $data['data'] = Pengguna::where('role_id', '<=', 2)->get();
        return view('admin.menu.petugas.index', $data);
    }

    public function tambah_vote()
    {
        $status = Akses::where('id',1)->get();
        foreach ($status as $p) {
        
        if ($p->status == "tutup") {
            return view('admin.menu.vote.notfound.index');
        } else {
             $data['desa'] = Desa::all();
             $data['lurah'] = Kelurahan::all();
        return view('admin.menu.vote.tambah', $data);
        }
        }
       
    }

    public function camat()
    {
        $data['status'] = Akses::where('id',2)->get();
        $data['data'] = Camat::all();
        return view('admin.menu.paslon.camat.index', $data);
    }

    public function lurah()
    {
        $data['status'] = Akses::where('id',3)->get();
        $data['data'] = Lurah::all();
        return view('admin.menu.paslon.lurah.index', $data);
    }

    public function tps()
    {
        $data['status'] = Akses::where('id',5)->get();
        $data['tps'] = Tps::all();
        return view('admin.menu.tps.index', $data);
    }

    public function hasil()
    {
        $data['camat'] = Paslon::where('jabatan_id', 2)->where('status','ya')->get();
        $data['title'] = "Camat";
        // dd($data->'id');
        return view('admin.menu.hasil.final', $data);
    }

    public function kadidat()
    {
        $data['lurah'] = Paslon::where('jabatan_id', 1)->where('status', 'ya')->get();
        $data['title'] = "Lurah";
        return view('admin.menu.hasil.final', $data);
    }

    // public function final_suara($id)
    // {
    //     $data['calon'] = Paslon::find($id);
    //     $data['hasil'] = Pengguna::where('')
    //     return view('admin.menu.hasil.hasil', $data);
    // }
}

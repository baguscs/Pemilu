<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
    	$data['data'] = Jadwal::orderBy('judul', 'desc')->get();
    	// dd($data['data']);
    	return view('admin.menu.jadwal.index', $data);
    }

    public function add(Request $req)
    {
    	// dd($req);
    	$messages =[
            'required' => 'Harap Bidang Ini',
        ];

    	$this->validate($req, [
    		'judul' => 'required',
            'tempat' => 'required',
    		'tglm' => 'required',
    		'tgls' => 'required'
    		
    	], $messages);

    	$data = new Jadwal;

    	$data->judul = $req->judul;
    	$data->tmp = $req->tempat;
    	$data->tgls = $req->tgls;
    	$data->tglm = $req->tglm;
    	// dd($data);

    	$data->save();


    	return redirect()->back()->with('pesan', 'Berhasil Menambah Jadwal '.$data->judul);
    }

    public function edit($id)
    {
        $number = Crypt::decrypt($id);
    	$data['data'] = Jadwal::find($number);
    	return view('admin.menu.jadwal.edit', $data);
    }

    public function edited(Request $req, $id)
    {
    	$messages =[
            'required' => 'Harap Bidang Ini',
        ];

    	$this->validate($req, [
    		'judul' => 'required',
            'tempat' => 'required',
    		'tglm' => 'required',
    		'tgls' => 'required'
    		
    	], $messages);

    	$data = Jadwal::find($id);

    	$data->judul = $req->judul;
    	$data->tmp = $req->tempat;
    	$data->tglm = $req->tglm;
    	$data->tgls = $req->tgls;

    	$data->save();
    	return redirect()->route('jadwal')->with('pesan', 'Berhasil Mengedit Jadwal '.$data->judul);

    }

    public function hapus($id)
    {
    	$hapus = Jadwal::find($id)->delete();
    	return redirect()->back()->with('pesan','Berhasil Menghapus Jadwal');
    }
}

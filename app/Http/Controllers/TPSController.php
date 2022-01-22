<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Images;
use Illuminate\Support\Facades\Crypt;
use App\Desa;
use App\Tps;
use App\Akses;
use File;
use Image;

class TPSController extends Controller
{
    public function tambah()
    {
    	$akses = Akses::where('id',5)->get();
      foreach ($akses as $p) {
        if ($p->status == "tutup") {
          return view('admin.menu.tps.notfound');
        } else {
        	$data['desa'] = Desa::all();
    	return view('admin.menu.tps.tambah', $data);
        }
        
      }
    	
    }

    public function add(Request $req)
    {
    	$messages =[
    		'unique' => 'Nama TPS Telah Dipakai',
    		'numeric' => 'Masukkan Harus Angka',
            'mimes' => 'Extensi Sesuai Dengan Ketentuan',
            'max' => 'Ukuran Melebihi Batas Maximum',
            'min' => 'Masukan Anda Kurang Dari Ketentuan',
        ];


    	$this->validate($req, [
    		'nama' => 'required|unique:tps',
    		'petugas' => 'required|numeric|min:10',
    		'pengawas' => 'required|numeric|min:3',
            'luas' => 'required|numeric',
            'link' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'foto' => 'required|file|mimes:jpg,jpeg|max:300'
    		
    	],$messages);

      $foto = $req->file('foto');
      $nama = time()."_".$foto->getClientOriginalName();
      $resize = Image::make($foto)->resize(400,300);
      $patch = public_path(). '/images/tps/' .$nama;
      $resize = Image::make($resize)->save($patch);

    	$add = new Tps;

    	$add->desa_id = $req->desa;
    	$add->nama = $req->nama;
    	$add->petugas = $req->petugas;
    	$add->alamat = $req->alamat;
    	$add->foto = $nama;
    	$add->ketua = $req->ketua;
        $add->luas = $req->luas;
        $add->link = $req->link;
    	$add->pesan = "Data Sedang Divalidasi";
    	$add->oleh = $req->oleh;
    	$add->pengawas = $req->pengawas;

    	$add->save();
    	return redirect()->route('tps')->with('pesan', 'Berhasil Menambah TPS'. " ". $add->nama);
    }

    public function edit($id)
    {
        $number = Crypt::decrypt($id);
        // dd($number);
    	 $akses = Akses::where('id',5)->get();
      foreach ($akses as $p) {
        if ($p->status == "tutup") {
          return view('admin.menu.tps.notfound');
        } else {
        $data['data'] = Tps::find($number);
        // dd($data['data']);
    	$data['desa'] = Desa::all();
    	return view('admin.menu.tps.edit', $data);
        }
        
      }
    	
    }

    public function edited(Request $req, $id)
    {
    	$messages =[
    		'numeric' => 'Masukkan Harus Angka',
            'mimes' => 'Extensi Sesuai Dengan Ketentuan',
            'max' => 'Ukuran Melebihi Batas Maximum',
            'min' => 'Masukan Anda Kurang Dari Ketentuan',
        ];

    	$this->validate($req, [
    		'petugas' => 'required|numeric|min:10',
    		'pengawas' => 'required|numeric|min:3',
            'luas' => 'required|numeric',
            'link' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'foto' => 'file|mimes:jpg,jpeg|max:300'
    		
    	],$messages);

    	$data = Tps::find($id);

    	 if ($req->foto) {
              $foto = $req->file('foto');
              $nama = time()."_".$foto->getClientOriginalName();
              $small = Image::make($foto)->resize(400,300);
              $loc = public_path(). '/images/tps/'. $nama;
              $change = Image::make($small)->save($loc);
              $lokasi_file = public_path() . "\\images\\tps" . "\\". $data->foto;
              unlink($lokasi_file);

              $data->foto = $nama;
            }

        $data->desa_id = $req->desa;
    	$data->nama =  $req->nama;
    	$data->petugas = $req->petugas;
    	$data->alamat = $req->alamat;
    	$data->ketua = $req->ketua;
        $data->luas = $req->luas;
        $data->link = $req->link;
    	$data->pesan = "Data Sedang Divalidasi";
    	$data->oleh = $req->oleh;
    	$data->pengawas = $req->pengawas;

    	$data->save();
    	return redirect()->route('tps')->with('pesan', 'Berhasil Mengupdate Data'." "."TPS ".$data->nama);
    }

    public function hapus($id)
    {
    	 $data = Akses::where('id',5)->get();
      foreach ($data as $p) {
        if ($p->status == "tutup") {
          return view('admin.menu.tps.notfound');
        } else {
        $foto = Tps::find($id);
        File::delete('images/tps/'.$foto->foto);

        $hapus = Tps::find($id)->delete();
        return redirect()->back()->with('pesan', 'Berhasil Menghapus TPS');
        }
        
      }
    	 
    }

    public function status(Request $req, $id)
    {
       $data = Akses::find($id);

        $data->status = $req->status;
        $data->save();

        return redirect()->back()->with('pesan','Status Pendataan TPS Telah Di'.$data->status);
    }

    public function verif($id)
    {
        $data['data'] = Tps::find($id);
        $data['desa'] = Desa::all();
        return view('admin.menu.tps.verif', $data);
    }

    public function verifed(Request $req, $id)
    {
        $data = Tps::find($id);

        $data->status = $req->status;
        $data->pesan = $req->pesan;

        $data->save();
        return redirect()->route('tps')->with('pesan', 'Berhasil Memverifikasi TPS '.$data->nama);
    }
}

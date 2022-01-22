<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Images;
use Illuminate\Support\Facades\Crypt;
use App\Kelurahan;
use App\Pengguna;
use App\User;
use File;
use Str;
use Image;

class PetugasController extends Controller
{
   public function tambah()
   {
   		$data['lurah'] = Kelurahan::all();
   		return view('admin.menu.petugas.tambah', $data);
   }

   public function add(Request $req)
   {
   	// dd($req);
   		$messages =[
    		'unique' => 'Masukkan Anda Telah Terdaftar',
            'mimes' => 'Extensi Sesuai Dengan Ketentuan',
            'max' => 'Ukuran Melebihi Batas Maximum',
        ];

    	$this->validate($req, [
    		'no_ket' => 'numeric|unique:pengguna',
            'foto' => 'required|file|mimes:jpg,jpeg|max:300'
    		
    	],$messages);
    	$foto = $req->file('foto');
      $nama = time()."_".$foto->getClientOriginalName();
      $resize = Image::make($foto)->resize(400,300);
      $patch = public_path(). '/images/pegawai/' .$nama;
      $resize = Image::make($resize)->save($patch);

    	$add = new Pengguna;

    	$add->role_id = $req->role;
    	$add->nama = $req->nama;
    	$add->no_ket = $req->nip;
    	if ($req->role == 1) {
    		$add->asal = "Komisi Pemilihan Umum Daerah";
    	} else {
    		$add->asal = $req->asal;
    	}
    	
    	
    	$add->foto = $nama;
    	$add->status = "ya";
    	$add->pesan = "Pegawai Aktif";
    	$add->akses = Str::random(5);

    	$add->save();
      // dd($add->id);

      $user = new User;

      $user->pengguna_id = $add->id;
      $user->email = $req->nip;
      $user->password = bcrypt($add->akses);
      $user->akses = $add->akses;

      $user->save();
    	return redirect()->route('pegawai')->with('pesan', 'Berhasil Menambah Pegawai'." ".$add->nama);
   }

   public function admin()
   {
   		return view('admin.menu.petugas.tambah2');
   }

   public function edit($id)
   {
      $number = Crypt::decrypt($id);
      $data['lurah'] = Kelurahan::all();
      $data['data'] = Pengguna::find($number);
     return view('admin.menu.petugas.edit', $data);
   }

   public function edited(Request $req, $id)
   {
    // dd($req);
    $messages =[
        'unique' => 'Masukkan Anda Telah Terdaftar',
            'mimes' => 'Extensi Sesuai Dengan Ketentuan',
            'max' => 'Ukuran Melebihi Batas Maximum',
        ];

      $this->validate($req, [
        'no_ket' => 'numeric',
            'foto' => 'file|mimes:jpg,jpeg|max:300'
        
      ],$messages);

          $data = Pengguna::find($id);

            if ($req->foto) {
                $foto = $req->file('foto');
              $nama = time()."_".$foto->getClientOriginalName();
              $small = Image::make($foto)->resize(400,300);
              $loc = public_path(). '/images/pegawai/'. $nama;
              $change = Image::make($small)->save($loc);
              $lokasi_file = public_path() . "\\images\\pegawai" . "\\". $data->foto;
              unlink($lokasi_file);

              $data->foto = $nama;
            }

            $data->nama = $req->nama;
            $data->no_ket = $req->nip;
            if ($req->role == 1) {
              $data->asal = "Komisi Pemilihan Umum Daerah";
            } else {
              $data->asal = $req->asal;
            }
            $data->status = $req->status;
            if ($req->status == "tidak") {
              $data->pesan == "Pegawai Diblokir";
            }

            $data->save();
            // dd($data);

            $user = User::where('pengguna_id', '=', $id)->firstOrFail();
            if ($data->status == "tidak") {
              $user->email = Str::random(10);
            }
            else{
              $user->email = $req->nip;
            }
            
            $user->save();
            // dd($user);
            return redirect()->route('pegawai')->with('pesan', 'Berhasil Mengedit Pegawai'." ".$data->nama);
      }

      public function hapus($id)
      {

        $data = User::find($id)->delete();

          $foto = Pengguna::find($id);
        File::delete('images/pegawai/'.$foto->foto);

        $hapus = Pengguna::find($id)->delete();

        return redirect()->back()->with('pesan', 'Berhasil Menghapus Pegawai');
      }
}

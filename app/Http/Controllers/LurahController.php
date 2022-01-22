<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Images;
use Illuminate\Support\Facades\Crypt;
use App\Paslon;
use App\Lurah;
use App\Kelurahan;
use App\Akses;
use App\User;
use App\Jadwal;
use File;
use Image;
use Auth;

class LurahController extends Controller
{
    public function tambah()
    {
      $akses = Akses::where('id',3)->get();
      $jadwal = Jadwal::where('judul','Pendaftaran Calon Lurah')->get();
      foreach ($jadwal as $note) {
        $tgl = $note->tgls;
      }
      
      $date = date('m/d/Y');
      // dd($tgl, $date);
        foreach ($akses as $p) {
          if ($p->status == "tutup" || $date >= $tgl) {
            return view('admin.menu.paslon.lurah.notfound');
          } else {
            $data['data'] = Kelurahan::all();
            return view('admin.menu.paslon.lurah.tambah', $data);
          }
          
        }
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
    		'nip' => 'required|numeric|unique:paslon',
    		'ijazah' => 'required|file|mimes:pdf|max:750',
            'foto' => 'required|file|mimes:jpg,jpeg|max:300',
            'visi' => 'required|file|mimes:jpg,jpeg|max:300',
            'misi' => 'required|file|mimes:jpg,jpeg|max:300',
            'akta' => 'required|file|mimes:pdf|max:750',
            'skck' => 'required|file|mimes:pdf|max:750'
    		
    	],$messages);

    	$add = new Lurah;

    	$foto = $req->file('foto');
      $nama = time()."_".$foto->getClientOriginalName();
      $resize = Image::make($foto)->resize(400,300);
      $patch = public_path(). '/images/lurah/' .$nama;
      $resize = Image::make($resize)->save($patch); 

    	$bukti = $req->file('skck');
    	$skck = time()."_".$bukti->getClientOriginalName();
    	$tujuan1 = 'storage';
    	$bukti->move($tujuan1,$skck);

        $pedidikan = $req->file('ijazah');
        $ijazah = time()."_".$pedidikan->getClientOriginalName();
        $tujuan2 = 'storage';
        $pedidikan->move($tujuan2,$ijazah);

      $visis = $req->file('visi');
        $visi = time()."_".$visis->getClientOriginalName();
        $visiku = Image::make($visis)->resize(400,300);
        $loc = public_path(). '/images/visi/'. $visi;
        $move = Image::make($visiku)->save($loc); 

       $misis = $req->file('misi');
        $misi = time()."_".$misis->getClientOriginalName();
        $misiku = Image::make($misis)->resize(400,300);
        $loct = public_path(). '/images/misi/'. $misi;
        $change = Image::make($misiku)->save($loct); 

        $aktas = $req->file('akta');
        $akta = time()."_".$aktas->getClientOriginalName();
        $tujuan5 = 'storage';
        $aktas->move($tujuan5,$akta);

    	$add->nama = $req->nama;
      $add->alamat = $req->alamat;
    	$add->nip = $req->nip;
    	$add->umur = $req->umur;
      $add->jkl = $req->jkl;
      $add->agama = $req->agama;
      $add->ex = $req->ex;
      $add->kelurahan_id = $req->tujuan;
      $add->kontribusi = $req->kontribusi;
      $add->ijazah = $ijazah;
    	$add->foto = $nama;
    	$add->skck = $skck;
      $add->visi = $visi;
      $add->misi = $misi;
      $add->akta = $akta;
      $add->pesan = "Data Sedang Divalidasi";
      $add->oleh = auth::user()->pengguna->nama;

    	$add->save();

    	return redirect()->route('lurah')->with('pesan','Berhasil Menambahkan Calon Lurah'." ".$add->nama);
    }

    public function hapus($id)
    {
      $data = Akses::where('id',3)->get();
      foreach ($data as $p) {
        if ($p->status == "tutup") {
          return view('admin.menu.paslon.lurah.notfound');
        } else {
          $foto = Lurah::find($id);
        File::delete('images/lurah/'.$foto->foto);

        $skck = Lurah::find($id);
        File::delete('storage/'.$skck->skck);

        $ijazah = Lurah::find($id);
        File::delete('storage/'.$ijazah->ijazah);

        $visi = Lurah::find($id);
        File::delete('storage/'.$visi->visi);

        $misi = Lurah::find($id);
        File::delete('storage/'.$misi->misi);

        $akta = Lurah::find($id);
        File::delete('storage/'.$akta->akta);

        $hapus = Lurah::find($id)->delete();
        return redirect()->back()->with('pesan', 'Berhasil Menghapus Calon Lurah');
        }
        
      }
    	
    }

    public function edit($id)
    {
      $number = Crypt::decrypt($id);
    	$data['data'] = Lurah::find($number);
    	$data['lurah'] = Kelurahan::all();
    	// dd($data);
    	return view('admin.menu.paslon.lurah.edit', $data);
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
    		'nip' => 'required|numeric',
    		'ijazah' => 'file|mimes:pdf|max:750',
            'foto' => 'file|mimes:jpg,jpeg|max:300',
            'visi' => 'file|mimes:jpg,jpeg|max:300',
            'misi' => 'file|mimes:jpg,jpeg|max:300',
            'akta' => 'file|mimes:pdf|max:750',
            'skck' => 'file|mimes:pdf|max:750'
    		
    	],$messages);

    	$data = Lurah::find($id);

		if ($req->ijazah) {
              $pendidikan = $req->bukti;
              $ijazah = time()."_".$pendidikan->getClientOriginalName();
              $tujuan = 'storage';
              $pendidikan->move($tujuan,$ijazah);
              $lokasi_file = public_path() . "\\storage" . "\\". $data->ijazah;
              unlink($lokasi_file);

              $data->ijazah = $ijazah;
            }  
        if ($req->foto) {
               $foto = $req->file('foto');
              $nama = time()."_".$foto->getClientOriginalName();
              $small = Image::make($foto)->resize(400,300);
              $loc = public_path(). '/images/lurah/'. $nama;
              $change = Image::make($small)->save($loc);
              $lokasi_file = public_path() . "\\images\\lurah" . "\\". $data->foto;
              unlink($lokasi_file);

              $data->foto = $nama;
            }

        if ($req->visi) {
             $visis = $req->file('visi');
              $visi = time()."_".$visis->getClientOriginalName();
              $small = Image::make($visis)->resize(400,300);
              $loc = public_path(). '/images/visi/'. $visi;
              $change = Image::make($small)->save($loc);
              $lokasi_file = public_path() . "\\images\\visi" . "\\". $data->visi;
              unlink($lokasi_file);

              $data->visi = $visi;
            }  

        if ($req->misi) {
               $misis = $req->file('misi');
              $misi = time()."_".$misis->getClientOriginalName();
              $small = Image::make($misis)->resize(400,300);
              $loc = public_path(). '/images/misi/'. $misi;
              $change = Image::make($small)->save($loc);
              $lokasi_file = public_path() . "\\images\\misi" . "\\". $data->misi;
              unlink($lokasi_file);

              $data->misi = $misi;
            }

        if ($req->skck) {
              $bukti = $req->skck;
              $skck = time()."_".$bukti->getClientOriginalName();
              $tujuan = 'storage';
              $bukti->move($tujuan,$skck);
              $lokasi_file = public_path() . "\\storage" . "\\". $data->skck;
              unlink($lokasi_file);

              $data->skck = $skck;
            } 

         if ($req->akta) {
              $aktas = $req->akta;
              $akta = time()."_".$aktas->getClientOriginalName();
              $tujuan = 'storage';
              $aktas->move($tujuan,$akta);
              $lokasi_file = public_path() . "\\storage" . "\\". $data->akta;
              unlink($lokasi_file);

              $data->akta = $akta;
            }

            $data->nama = $req->nama;
            $data->nip = $req->nip;
            $data->umur = $req->umur;
            $data->jkl = $req->jkl;
            $data->agama = $req->agama;
            $data->ex = $req->ex;
            $data->kontribusi = $req->kontribusi;
            $data->kelurahan_id = $req->tujuan;
            $data->save();

            return redirect()->route('lurah')->with('pesan', 'Berhasil Merubah Data Calon Lurah'." ".$data->nama);    	
    }

    public function verif($id)
    {
      $number = Crypt::decrypt($id);
      $data = Lurah::find($number);
      return view('admin.menu.paslon.lurah.verif_lurah', compact('data'));
    }

    public function verified(Request $req, $id)
    {
    	 $messages =[
            'required' => 'Ini Harus Diisi',
        ];

        $this->validate($req, [
            'status' => 'required',
            'pesan' => 'required'
            
        ],$messages);

        $data = Lurah::find($id);

        $data->status = $req->status;
        $data->pesan = $req->pesan;

        $data->save();
        return redirect()->route('lurah')->with('pesan', 'Berhasil Memverifikasi Data Calon'." ".$data->nama);
    }

    public function status(Request $req, $id)
    {
      $data = Akses::find($id);

        $data->status = $req->status;
        $data->save();

        return redirect()->back()->with('pesan','Status Pendaftaran Calon Lurah Telah Di'.$data->status);
    }

    public function norut(Request $req, $id)
    {
         $messages =[
            'required' => 'Ini Harus Diisi',
            'numeric' => 'Harus Angka',
            'unique' => 'Nomor Sudah Terpakai',
        ];

        $this->validate($req, [
            'norut' => 'required|numeric|unique:lurahs'
            
        ],$messages);

      $edit = Lurah::find($id);
      $edit->norut = $req->norut;
      $edit->save();

      return redirect()->back()->with('pesan', 'Berhasi Menambahkan Nomor Urut '.$edit->nama);
    }
}

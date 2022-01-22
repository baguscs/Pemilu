<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Images;
use Illuminate\Support\Facades\Crypt;
use App\Camat;
use App\Jadwal;
use App\Akses;
use App\User;
use Image;
use File;
use Auth;

class CamatController extends Controller
{
    public function tambah()
    {
      $jadwal = Jadwal::where('judul', 'Pendaftaran Calon Camat')->get();
      $data = Akses::where('id',2)->get();
      foreach ($jadwal as $note) {
        $tgl = $note->tgls; 
      }
      $date = date('m/d/Y');
      foreach ($data as $p) {
        if ($p->status == "tutup" || $date >= $tgl) {
          return view('admin.menu.paslon.notfound');
        } else {
          return view('admin.menu.paslon.camat.tambah_camat');
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
        'skck' => 'required|file|mimes:pdf|max:750'
    		
    	],$messages);

    	$foto = $req->file('foto');
    	$nama = time()."_".$foto->getClientOriginalName();
      $resize = Image::make($foto)->resize(400,300);
      $patch = public_path(). '/images/camat/' .$nama;
      $resize = Image::make($resize)->save($patch); 
    	// $foto->move($tujuan,$nama);
    

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

    	$add = new Camat;
        
    	$add->nama = $req->nama;
      $add->alamat = $req->alamat;
    	$add->nip = $req->nip;
    	$add->umur = $req->umur;
      $add->jkl = $req->jkl;
      $add->agama = $req->agama;
      $add->kontribusi = $req->kontribusi;
      $add->ex = $req->ex;
      $add->ijazah = $ijazah;
    	$add->foto = $nama;
    	$add->skck = $skck;
      $add->visi = $visi;
      $add->misi = $misi;
      $add->pesan = "Data Sedang Divalidasi";
      $add->oleh = auth::user()->pengguna->nama;

      // dd($add);

    	$add->save();

    	return redirect()->route('camat')->with('pesan','Berhasil Menambahkan Calon Camat'." ".$add->nama);
    }

    public function hapus($id)
    {
      $data = Akses::where('id',2)->get();
      foreach ($data as $p) {
        if ($p->status == "tutup") {
          return view('admin.menu.paslon.notfound');
        } else {
          $foto = Camat::find($id);
        File::delete('images/camat/'.$foto->foto);

        $skck = Camat::find($id);
        File::delete('storage/'.$skck->skck);

        $ijazah = Camat::find($id);
        File::delete('storage/'.$ijazah->ijazah);

        $visi = Camat::find($id);
        File::delete('storage/'.$visi->visi);

        $misi = Camat::find($id);
        File::delete('storage/'.$misi->misi);

        $hapus = Camat::find($id)->delete();
        return redirect()->back()->with('pesan', 'Berhasil Menghapus Calon Camat');
        }
        
      }
        
    }

    public function edit($id)
    {
      // dd($id);
      $number = Crypt::decrypt($id);
      $akses = Akses::where('id',2)->get();
      foreach ($akses as $p) {
        if ($p->status == "tutup") {
          return view('admin.menu.paslon.notfound');
        } else {
          $data['data'] = Camat::find($number);
          // dd($data);
        return view('admin.menu.paslon.camat.edit_camat', $data);
        }
        
      }
    }

    public function edited(Request $req, $id)
    {
        $messages =[
            'mimes' => 'Harus Sesuai Dengan Ketentuan',
            'max' => 'Ukuran Melebihi Batas Maximum',
        ];

        $this->validate($req, [
            'nip' => 'required|numeric',
            'ijazah' => 'file|mimes:pdf|max:750',
            'foto' => 'file|mimes:jpg,jpeg|max:300',
            'visi' => 'file|mimes:jpg,jpeg|max:300',
            'misi' => 'file|mimes:jpg,jpeg|max:300',
            'skck' => 'file|mimes:pdf|max:750'
            
        ],$messages);

        $data = Camat::find($id);

        
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
              $loc = public_path(). '/images/camat/'. $nama;
              $change = Image::make($small)->save($loc);

              $lokasi_file = public_path() . "\\images\\camat" . "\\". $data->foto;
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

            $data->nama = $req->nama;
            $data->nip = $req->nip;
            $data->umur = $req->umur;
            $data->jkl = $req->jkl;
            $data->agama = $req->agama;
            $data->kontribusi = $req->kontribusi;
            $data->ex = $req->ex; 
            $data->save();


            return redirect()->route('camat')->with('pesan', 'Berhasil Mengedit Calon Camat'." ".$data->nama);     
    }

    public function verif($id)
    {
        $number = Crypt::decrypt($id);
        $data['data'] = Camat::find($number);
        return view('admin.menu.paslon.camat.verif_camat', $data);
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

        $data = Camat::find($id);

        $data->status = $req->status;
        $data->pesan = $req->pesan;

        $data->save();
        return redirect()->route('camat')->with('pesan', 'Berhasil Memverifikasi Data Calon Camat'." ".$data->nama);
    }

    public function status(Request $req, $id)
    {
       $data = Akses::find($id);

        $data->status = $req->status;
        $data->save();

        return redirect()->back()->with('pesan','Status Pendaftaran Calon Camat Telah Di'.$data->status);
    }

    public function norut(Request $req, $id)
    {
       $messages =[
            'required' => 'Ini Harus Diisi',
            'numeric' => 'Harus Angka',
            'unique' => 'Nomor Sudah Terpakai',
        ];

        $this->validate($req, [
            'norut' => 'required|numeric|unique:camats'
            
        ],$messages);

      $edit = Camat::find($id);
      $edit->norut = $req->norut;
      $edit->save();

      return redirect()->back()->with('pesan', 'Berhasi Menambahkan Nomor Urut '.$edit->nama);

    }
}
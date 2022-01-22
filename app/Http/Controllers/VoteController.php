<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Images;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Pengguna;
use App\User;
use App\Desa;
use App\Akses;
use App\Tps;
use App\Voting;
use App\Kelurahan;
use File;
use Auth;
use Str;
use Image;
use DB;

class VoteController extends Controller
{
    public function add(Request $req)
    {
        $messages =[
            'unique' => 'Masukkan Anda Telah Terdaftar',
            'numeric' => 'Masukkan Harus Angka',
            'mimes' => ':attribute Harus JPG/JPEG',
            'max' => 'Ukuran File Melebihi Ketentuan Maximal',
        ];

    	$this->validate($req, [
    		'nama' => 'required',
            'email' => 'required|unique:pengguna',
    		'no_ket' => 'required|numeric|unique:pengguna',
    		'desa' => 'required',
    		'jkl' => 'required',
            'bukti' => 'required|file|mimes:jpg,jpeg|max:300',
    		'ttg' => 'required'
    		
    	], $messages);

      $ktp = $req->file('bukti');
      $nama = time()."_".$ktp->getClientOriginalName();
      $resize = Image::make($ktp)->resize(400,300);
      $patch = public_path(). '/images/vote/' .$nama;
      $resize = Image::make($resize)->save($patch);

    	$add = new Pengguna;

    	$add->role_id = 4;
        $add->cek = $req->cek;
        $add->kelurahan_id = $req->lurah;
    	$add->desa_id = $req->desa;
    	$add->nama = $req->nama;
        $add->email = $req->email;
    	$add->no_ket = $req->no_ket;
    	$add->ttg = $req->ttg;
    	$add->jkl = $req->jkl;
    	$add->bukti = $nama;
        $add->pesan = "Data Sedang di Validasi";

    	$add->save();

    	return redirect()->route('vote')->with('pesan','Berhasil Menambahkan Voters'." ".$add->nama);
    }

    public function hapus($id)
    {
         $status = Akses::where('id',1)->get();
        foreach ($status as $p) {
        
        if ($p->status == "tutup") {
            return view('admin.menu.vote.notfound.index');
        } else {
           $gambar = Pengguna::find($id);
        File::delete('images/vote/'.$gambar->bukti);

        Pengguna::find($id)->delete();
        return redirect()->back()->with('pesan', 'Berhasil Menghapus Voters');
        }
        }   
        
    }

    public function edit($id)
    {
        $number = Crypt::decrypt($id);
        $status = Akses::where('id',1)->get();
        foreach ($status as $p) {
        
        if ($p->status == "tutup") {
            return view('admin.menu.vote.notfound.index');
        } else {
        $data = Pengguna::find($number);
        $desa = Desa::all();
        $lurah = Kelurahan::all();
        // dd($data);
        return view('admin.menu.vote.edit', compact('data','desa','lurah'));
        }
        }
       
    }

    public function edited(Request $req, $id)
    {
        // dd($req);
      $messages =[
            'unique' => 'Masukkan Anda Telah Terdaftar',
            'numeric' => ':attribute Harus Angka',
            'mimes' => ':attribute Harus JPG/JPEG',
        ];

        $this->validate($req, [
            // 'role' => 'required',
            // 'desa' => 'required',
            // 'nama' => 'required',
            // 'no_ket' => 'required|numeric',
            // 'email' => 'required|unique:pengguna',
            // 'ttg' => 'required',  
            // 'jkl' => 'required',
            // 'telpon' => 'required|numeric',
            'bukti' => 'file|mimes:jpg,jpeg'
        
        ], $messages);

        $data = Pengguna::find($id);

        if ($req->bukti) {
               $foto = $req->file('bukti');
              $nama = time()."_".$foto->getClientOriginalName();
              $small = Image::make($foto)->resize(400,300);
              $loc = public_path(). '/images/vote/'. $nama;
              $change = Image::make($small)->save($loc);

             $lokasi_file = public_path() . "\\images\\vote" . "\\". $data->bukti;
              // dd($lokasi);
              unlink($lokasi_file);

              $data->bukti = $nama;
          }  

        $data->role_id = $req->role;
        $data->kelurahan_id = $req->lurah;
        $data->desa_id = $req->desa;
        $data->nama = $req->nama;
        $data->no_ket = $req->no_ket;
        $data->email = $req->email;
        $data->ttg = $req->ttg;
        $data->jkl = $req->jkl;
        // $data->telpon = $req->telpon;
        if (auth::user()->pengguna->role_id == 1) {
             $data->status = $req->status;
             $data->pesan = $req->pesan;
        }
        $data->cek = $req->cek;

        // dd($req);
        $data->save();
        return redirect()->route('vote')->with('pesan','Berhasil Mengedit Data Voters'." ".$data->nama);
    }

    public function verif($id)
    {
        $number = Crypt::decrypt($id);
        $data['data'] = Pengguna::find($number);
        return view('admin.menu.vote.verif', $data); 
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

        $data = Pengguna::find($id);

        $data->cek = $req->cek;
        $data->status = $req->status;
        $data->pesan = $req->pesan;
        if ($req->status == 'ya') {
            $data->akses = Str::random(5);
        }

        $email = $req->email;
        // dd($email);
        $tahun = date('Y');
       


        $data->save();

        if ($req->status == 'ya') {
             $verif = array(
                    'nama' => $req->nama,
                    'pesan' => "Selamat Anda Telah Terdaftar di Data Pemilih Pemilu Online Tahun ". $tahun,
                    'pass' => $data->akses,
                    'tahun' => date('Y'),
                    'nik' => $req->nik,
                    'ttg' => $req->ttg,
                    'jkl' => $req->jkl,
                    'desa' => $req->desa,
                );

              //kirim email
              Mail::send('admin.menu.vote.valid', $verif, function($mail) use($email){
                    $mail->to($email, 'no-reply')
                        ->subject("Konfirmasi Hak Pilih Pemilu");
                    $tahun = date('Y');
                    $mail->from('no-reply@gmail.com', 'Pemilu Online '. $tahun);
                });

                $user = new User;
                $user->pengguna_id = $req->id;
                $user->email = $req->nik;
                $user->password = bcrypt($data->akses);
                $user->akses = $data->akses;

                $user->save();

            //cek 
            if (Mail::failures()) {
                return redirect()->route('vote')->with('pesan', 'Email Gagal Terkirim');
            }
            return redirect()->route('vote')->with('pesan', 'Berhasil Mengkonfirmasi Voters '.$data->nama);
        }
        else{
            $verif = array(
                    'nama' => $req->nama,
                    'pesan' => "Maaf Anda Gagal Mendapatkan Hak Suara Pemilu ". $tahun." Karena ".$req->pesan,
                    'pass' => $data->akses,
                    'tahun' => date('Y'),
                    'nik' => $req->nik,
                    'ttg' => $req->ttg,
                    'jkl' => $req->jkl,
                    'desa' => $req->desa,
                );

              //kirim email
              Mail::send('admin.menu.vote.valid', $verif, function($mail) use($email){
            $mail->to($email, 'no-reply')
                 ->subject("Konfirmasi Hak Pilih Pemilu");
            $tahun = date('Y');
            $mail->from('haryasiswoyo123@gmail.com', 'Pemilu Online '. $tahun);
        });
            if (Mail::failures()) {
            return redirect()->route('vote')->with('pesan', 'Email Gagal Terkirim');
        }
        return redirect()->route('vote')->with('pesan', 'Berhasil Mengkonfirmasi Voters');
        }
        }
        
        // return view('admin.menu.vote.valid', $verif);
       

    public function status(Request $req, $id)
    {
        $data = Akses::find($id);

        $data->status = $req->status;
        $data->save();

        return redirect()->back()->with('pesan','Status Pendaftaran Voters Telah Di'.$data->status);
    }

    public function voting(Request $req, $id)
    {
        // dd($req);
        $messages =[
            'required' => 'Isi Bidang ini',
            'numeric' => 'Isi Dengan Angka',
        ];

        $this->validate($req, [
            'lurah' => 'required',
            'camat' => 'required',
            'nik' => 'required|numeric',
            'kode' => 'required'
        
        ], $messages);
        $data = Pengguna::find($id);
        $kode = $req->kode;
        $nik = $req->nik;

        if ($data->no_ket == $nik) {
            if ($data->akses == $kode) {
                $data->pilih = "ya";
                $data->save();

                $add = new Voting;
                $add->pengguna_id = auth::user()->pengguna->id;
                $add->lurahs_id = $req->lurah;
                $add->camats_id = $req->camat;

                $add->save();

                return redirect()->route('oke')->with('pesan', 'Voting Sukses');
            }
            else{
                // return "Masukkan Kode anda salah";
                return redirect()->back()->with('pesan', 'Maaf Kode Akses Yang Anda Masukkan Tidak Dikenali');
            }
        }
        else{
            // return "Masukan NIK Anda salah";
            return redirect()->back()->with('pesan', 'Maaf NIK Yang Anda Masukkan Anda Tidak Dikenali');
        }
  
    }

    public function oke()
    {
        return view('vote.valid');
    }

    public function cek()
    {
        $desa = Desa::all();
        $asal_desa = []; 
        $total = [];
        $vote = [];

        foreach ($desa as $key) {
            $asal_desa[] = $key->desa;
            $total[] = Pengguna::where('desa_id', $key->id)->where('status','ya')->count(); 
            $vote[] = Pengguna::where('desa_id', $key->id)->where('pilih','ya')->count();
        }

        $sum = Pengguna::where('role_id',4)->where('status','ya')->count();
        $tps = Tps::all()->count();
        return view('admin.menu.hasil.cek', compact('asal_desa','total','sum','tps','vote'));
    }
}

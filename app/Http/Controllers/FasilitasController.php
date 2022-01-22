<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Images;
use Image;
use App\Fasilitas;
use App\Akses;
use Session;
use Auth;
use File;

class FasilitasController extends Controller
{
    public function add(Request $request)
    {
        
            $messages =[
            'unique' => 'Masukkan Anda Telah Terdaftar',
            'mimes' => 'Extensi Sesuai Dengan Ketentuan',
            'max' => 'Ukuran Melebihi Batas Maximum',
        ];

    	$this->validate($request,[
    		'jenis' => 'required',
    		'kebutuhan' => 'required|numeric',
            // 'rusak' => 'required|numeric',
            'foto' => 'required|file|mimes:jpg,jpeg|max:300',
    		'tersedia' => 'required|numeric'
    	], $messages);

    	$post = new Fasilitas;

      $foto = $request->file('foto');
      $nama = time()."_".$foto->getClientOriginalName();
      $resize = Image::make($foto)->resize(400,300);
      $patch = public_path(). '/images/fasilitas/' .$nama;
      $resize = Image::make($resize)->save($patch);

        $post->oleh = auth::user()->pengguna->nama;
    	$post->jenis = $request->jenis;
    	$post->kebutuhan = $request->kebutuhan;
    	$post->tersedia = $request->tersedia;
        $post->kerusakan = 0;
        $post->foto = $nama;
            // dd($post);
    	$post->save();
    	return redirect()->route('home')->with('pesan','Berhasil Menambah Fasilitas'." ". $post->jenis);
    }

    public function hapus($id)
    {
         $status = Akses::where('id',4)->get();
        foreach ($status as $p) {
        
        if ($p->status == "tutup") {
            return view('admin.menu.fasilitas.notfound');
        } else {
            $foto = Fasilitas::find($id);
            File::delete('images/fasilitas/'.$foto->foto);
            $hapus = Fasilitas::find($id)->delete();
            return redirect()->back()->with('pesan','Berhasil Menghapus Fasilitas');
        }
        }
    	
    }

    public function post(Request $request, $id)
    {
         $status = Akses::where('id',4)->get();
        foreach ($status as $p) {
        
        if ($p->status == "tutup") {
            return view('admin.menu.fasilitas.notfound');
        } else {
            $messages =[
            'unique' => 'Masukkan Anda Telah Terdaftar',
            'mimes' => 'Extensi Sesuai Dengan Ketentuan',
            'max' => 'Ukuran Melebihi Batas Maximum',
        ];

           $this->validate($request, [
            'jenis' => 'required',
            'tersedia' => 'required|numeric',
            'rusak' => 'required|numeric',
            'foto' => 'file|mimes:jpg,jpeg|max:300',
            'kebutuhan' => 'required|numeric'
        ], $messages);

        $edit = Fasilitas::find($id);

        if ($request->foto) {
              $foto = $request->file('foto');
              $nama = time()."_".$foto->getClientOriginalName();
              $small = Image::make($foto)->resize(400,300);
              $loc = public_path(). '/images/fasilitas/'. $nama;
              $change = Image::make($small)->save($loc);
              $lokasi_file = public_path() . "\\images\\fasilitas" . "\\". $edit->foto;
              unlink($lokasi_file);

              $edit->foto = $nama;
            }

        $edit->oleh = $request->oleh;
        $edit->jenis = $request->jenis;
        $edit->tersedia = $request->tersedia;
        $edit->kebutuhan = $request->kebutuhan;
        $edit->kerusakan = $request->rusak;

        $edit->save();
        return redirect()->back()->with('pesan','Berhasil Mengedit Fasilitas'." ".$edit->jenis); 
        }
        }
        // dd($request);
    	
    }

    public function status(Request $req, $id)
    {
        $data = Akses::find($id);

        $data->status = $req->status;
        $data->save();

        return redirect()->back()->with('pesan','Status Pendataan Fasilitas Telah Di'.$data->status);
    }
}

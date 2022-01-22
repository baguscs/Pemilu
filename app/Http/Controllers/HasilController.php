<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Camat;
use App\Lurah;
use App\Voting;
use App\Kelurahan;
use App\Jadwal;

class HasilController extends Controller
{
    public function camat()
    {
		$jadwal = Jadwal::where('judul','Pengumuman Hasil Pemilu')->get();
		foreach ($jadwal as $note) {
		  $tgl = $note->tglm;
		  $tgls = $note->tgls;
		}
		$date = date('m/d/Y');
		if($date == $tgl || $date <= $tgls){
			$camat = Camat::all();
			$nama = [];
			$hasil = [];

			foreach ($camat as $element) {
				$nama[] = $element->nama;
				$hasil[] = Voting::where('camats_id', $element->id)->count();
			}
			return view('admin.menu.hasil.camat', compact('camat','nama','hasil'));
		}
		else{
			return view('admin.menu.hasil.eror');
    	}
    }

    public function lurah()
    {
    	$data = Kelurahan::all();
    	return view('admin.menu.hasil.menu_lurah', compact('data'));
    }

    public function detail($id)
    {
		$jadwal = Jadwal::where('judul','Pengumuman Hasil Pemilu')->get();
		foreach ($jadwal as $note) {
		  $tgl = $note->tglm;
		}

		$date = date('m/d/Y');
		
		if($date >= $tgl){
		$number = Crypt::decrypt($id);
		$data = Lurah::where('kelurahan_id', $number)->get();
		$nama = [];
		$globals = [];

		foreach ($data as $value) {
			$nama[] = $value->nama;
			$globals[] = Voting::where('lurahs_id', $value->id)->count();
		}
		return view('admin.menu.hasil.lurah', compact('data','nama','globals'));
		}
		else{
			return view('admin.menu.hasil.eror');
		}
		
    }
}
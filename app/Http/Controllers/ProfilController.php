<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Pengguna;
use Auth;

class ProfilController extends Controller
{
    public function user(Request $req, $id)
    {
    	$this->validate($req, [
    		'user' => 'required'
    	]);

    	$data = User::find($id);

    	$data->email = $req->user;

    	$data->save();
    	return redirect()->route('home')->with('notif','Berhasil Merubah Username');
    }

    public function pass(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $data = User::query()->whereId(auth()->user()->id)->firstOrFail();
        $old_password = Hash::check($request->input('old_password'), $data->password);

        if ($old_password) {
           $data->update([
                'password' => Hash::make($request->input('password')),
            ]);

           $id = auth::user()->pengguna_id;

           $user = User::find($id);
           $user->akses = NUll;
           $user->save();
            // dd($id);
            $pegawai = Pengguna::find($id);
            $pegawai->akses = "Diubah";
            $pegawai->save();

           return redirect()->route('home')->with('notif', 'Berhasil Merubah Password');
        }


        return redirect()->back()->with('salah', 'Maaf Password Lama yang anda masukkan salah');
    }
}

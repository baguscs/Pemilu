@extends('admin.master')
@section('konten')
<section class="content">
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PROFIL
							</h2>
                        </div>
                        
                        <div class="text-center">
						  <img src="{{ asset('images/pegawai/'. Auth::user()->pengguna->foto) }}" class="rounded" alt="..." width="25%">
						</div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<label>Nama</label>
                                            <input type="text" class="form-control" placeholder="Username" value="{{Auth::user()->pengguna->nama}}" readonly="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<label>NIP</label>
                                            <input type="text" class="form-control" placeholder="NIP" value="{{Auth::user()->pengguna->nip}}" readonly="" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            @if (Auth::user()->pengguna->role_id == 1)
                                                <label> Asal Pegawai</label>
                                             <input type="text" readonly="" class="form-control" value="Komisi Pemilihan Umum" />

                                             @elseif(Auth::user()->pengguna->role_id == 2)
                                             <label> Asal Pegawai</label>
                                            <input type="text" readonly="" class="form-control" value="{{Auth::user()->pengguna->asal}}" />

                                            @elseif(Auth::user()->pengguna->role_id == 3)
                                            <label> Asal Pegawai</label>
                                            <input type="text" readonly="" class="form-control" value="Komisi Pemilihan Umum" />
                                            @else
                                            <label> Asal Desa</label>
                                            <input type="text" readonly="" class="form-control" value="{{Auth::user()->pengguna->desa->desa}}" />
                                            @endif
                                        	
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <form method="post" action="{{ route('ganti_user', Auth::user()->pengguna_id) }}">
                                            @csrf
                                        <div class="form-line">
                                            <label>Username</label>
                                            <input type="text" name="user" readonly="" required="" class="form-control" value="{{Auth::user()->email}}" />
                                        </div>
                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
           
@endsection
@extends('admin.master')
@section('konten')
	<section class="content">
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    	 @if ($messege = Session::get("salah"))
                             <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ Session::get("salah") }}
                            </div>
            @endif
                        <div class="header">
                            <h2>
                                GANTI PASSWORD
							</h2>
                        </div>
                        
						<div class="body">
							<form method="post" action="{{ route('ganti_password') }}">
								@csrf
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<label>Masukkan Password Lama</label>
                                            <input type="text" required="" class="form-control" placeholder="Masukkan Password Lama" autocomplete="off" name="old_password" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<label>Masukkan Password Baru</label>
                                            <input type="password" required="" autocomplete="off" name="password" class="form-control" placeholder="Masukkan Password Baru" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<label>Konfirmasi Password</label>
                                            <input type="password" required="" autocomplete="off" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<button class="btn btn-block btn-success" type="submit"><i class="material-icons">save</i> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<a href="{{ route('home') }}" type="button" class="btn btn-block btn-danger"><i class="material-icons">cancel</i> Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
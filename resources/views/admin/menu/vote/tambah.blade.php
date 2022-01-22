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
                                TAMBAH VOTERS
                            </h2>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Data Voters</h2>
                            <form method="post" action="{{ route('add_vote') }}" enctype="multipart/form-data">
                            	@csrf
                                <input type="text" name="cek" value="{{auth::user()->pengguna->nama}}" readonly="" hidden="">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Nama</h2>
                                            <input type="text" name="nama" value="{{old('nama')}}" required="" autocomplete="off" class="form-control" placeholder="Nama Voters" />
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">NIK</h2>
                                            <input type="number" name="no_ket" value="{{old('no_ket')}}" required="" autocomplete="off" class="form-control" placeholder="NIK" />
                                        </div>
                                        @error('no_ket')
                                        <div class="alert alert-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">E-Mail</h2>
                                            <input type="email" name="email" value="{{old('email')}}" required="" autocomplete="off" class="form-control" placeholder="E-Mail" />
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Jenis Kelamin</h2>
                                    <select name="jkl" required="" class="form-control show-tick">
                                        <option value="{{old('jkl')}}">-- Silahkan Pilih --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Asal Desa</h2>
                                    <select id="desa" name="desa" required="" class="form-control">
                                        <option value="{{old('desa')}}">-- Silahkan Pilih --</option>
                                        @foreach ($desa as $p)
                                            <option value="{{$p->id}}">{{$p->desa}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Kelurahan</h2>
                                    <select id="lurah" name="lurah" required="" class="form-control">
                                        <option value="{{old('desa')}}">-- Silahkan Pilih --</option>
                                        @foreach ($lurah as $p)
                                            <option value="{{$p->id}}">{{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Tanggal Lahir</h2>
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="text" value="{{old('ttg')}}" autocomplete="off" name="ttg" required="" class="form-control" placeholder="Silahkan Pilih Tanggal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="margin-top: 10px">
                                    <h2 class="card-inside-title">Foto Kartu Tanda Penduduk</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" value="{{old('bukti')}}" name="bukti" required="" placeholder="File Bukti">
                                        </div>
                                        <div class="help-info">
                                            File harus berextensi JPG/JPEG
                                            <p>Ukuran File Maximal 300KB</p>
                                        </div>
                                        @error('bukti')
                                        <br>
                                        <br>
                                        <div class="alert alert-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>                                    
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="basic_checkbox_2" class="filled-in" required="" />
                                        <label for="basic_checkbox_2">Saya telah memahami dan memeriksa tentang kebenaran data diatas, serta saya akan bertanggung jawab jika ada kesalahan.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button class="btn btn-block btn-success" type="submit"><i class="material-icons">save</i> Simpan</button>
                                    </div>
                                </div>
                            
                            {{-- <div class="row clearfix"> --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <a href="{{ route('vote') }}" class="btn btn-block btn-danger"><i class="material-icons">cancel</i> Batal</a>
                                    </div>
                                </div>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
       $("#desa").select2({
         allowClear: true
       });
       $("#lurah").select2({
         allowClear: true
       });
    </script>
@endpush
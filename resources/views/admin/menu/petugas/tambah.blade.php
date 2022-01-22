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
                                TAMBAH PETUGAS
                            </h2>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Data Petugas</h2>
                            <form method="post" action="{{ route('add_pegawai') }}" enctype="multipart/form-data">
                            	@csrf
                            	<input type="number" name="role" value="2" hidden="">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Nama</h2>
                                            <input type="text" name="nama" value="{{old('nama')}}" required="" autocomplete="off" class="form-control" placeholder="Nama Petugas" />
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">NIP</h2>
                                            <input type="number" name="nip" value="{{old('nip')}}" required="" autocomplete="off" class="form-control" placeholder="NIP" />
                                        </div>
                                        @error('no_ket')
                                        <div class="alert alert-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>   
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Asal Instansi</h2>
                                    <select id="asal" name="asal" required="" class="form-control">
                                        <option value="{{old('asal')}}">-- Silahkan Pilih --</option>
                                        @foreach ($lurah as $p)
                                            <option value="{{$p->nama}}">Kelurahan {{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6" style="margin-top: 10px">
                                    <h2 class="card-inside-title">Foto Pegawai</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" value="{{old('foto')}}" name="foto" required="" placeholder="File">
                                        </div>
                                        <div class="help-info">
                                            File harus berextensi JPG/JPEG
                                            <p>Ukuran File Maximal 300KB</p>
                                        </div>
                                        @error('foto')
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
                                        <a href="{{ route('pegawai') }}" class="btn btn-block btn-danger"><i class="material-icons">cancel</i> Batal</a>
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
       $("#asal").select2({
         allowClear: true
       });
    </script>
@endpush
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
                                TAMBAH FASILITAS
                            </h2>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Data Fasilitas</h2>
                            <form method="post" action="{{ route('add_fasilitas') }}" enctype="multipart/form-data">
                            	@csrf
                                <input type="text" name="oleh" value="{{auth::user()->pengguna->nama}}" hidden="">
                            <div class="row clearfix">
                                <div class="col-sm-6" style="margin-top: 15px">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="jenis" required="" autocomplete="off" class="form-control" placeholder="Jenis Fasilitas" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Foto Barang</h2>
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" required="" class="form-control" name="kebutuhan" autocomplete="off" placeholder="Kebutuhan" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" required="" name="tersedia" autocomplete="off" class="form-control" placeholder="Tersedia" />
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" required="" name="rusak" autocomplete="off" class="form-control" placeholder="Kerusakan" />
                                        </div>
                                    </div>
                                </div> --}}
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
                                        <button type="submit" class="btn btn-block btn-success"><i class="material-icons">save</i> Simpan</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-block btn-danger" onclick="history.back(-1)"><i class="material-icons">cancel</i> Batal</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
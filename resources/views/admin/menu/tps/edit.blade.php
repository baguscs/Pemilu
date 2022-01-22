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
                                EDIT TEMPAT PEMUNGUTAN SUARA
                            </h2>
                        </div>
                        <div class="body">
                            @foreach ($data as $tps)
                                {{-- expr --}}
                            
                            <h2 class="card-inside-title">Data Tempat</h2>
                            <form method="post" action="{{ route('ganti_tps', $tps->id) }}" enctype="multipart/form-data">
                            	@csrf
                                <input type="text" hidden="" name="oleh" value="{{auth::user()->pengguna->nama}}" readonly="">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Nama</h2>
                                            <input type="text" name="nama" value="{{$tps->nama}}" required="" autocomplete="off" class="form-control" placeholder="Nama Tempat" />
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Alamat</h2>
                                            <input type="text" name="alamat" value="{{$tps->alamat}}" required="" autocomplete="off" class="form-control" placeholder="Alamat" />
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h2 style="margin-bottom: 22px" class="card-inside-title">Berada di Desa</h2>
                                    <select id="desa" name="desa" required="" class="form-control">
                                        <option value="{{old('desa')}}">-- Silahkan Pilih --</option>
                                        @foreach ($desa as $p)
                                            <option value="{{$p->id}}">{{$p->desa}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                 
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Petugas</h2>
                                            <input type="number" min="10" name="petugas" value="{{$tps->petugas}}" required="" autocomplete="off" class="form-control" placeholder="Banyak Petugas" />
                                        </div>
                                         <div class="help-info">
                                            Minimal Petugas 10 Orang
                                        </div>
                                        @error('petugas')
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
                                            <h2 class="card-inside-title">Pengawas KPU</h2>
                                            <input type="number" min="3" name="pengawas" value="{{$tps->pengawas}}" required="" autocomplete="off" class="form-control" placeholder="Banyak Pengawas" />
                                        </div>
                                         <div class="help-info">
                                            Minimal Pengawas 3 Orang 
                                        </div>
                                        @error('pengawas')
                                        <br>
                                        <div class="alert alert-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <h2 class="card-inside-title">Luas Lahan</h2>
                                        <input type="number" name="luas" required="" value="{{$tps->luas}}" autocomplete="" class="form-control" placeholder="Luas Lahan">
                                    </div>
                                    <div class="help-info">
                                        Dalam Satuan m<sup>2</sup>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <h2 class="card-inside-title">Link Lokasi</h2>
                                        <a href="{{$tps->link}}" target="_blank" class="btn btn-info" type="button" style="text-decoration: none">Lihat Lokasi</a>
                                        <input type="url" name="link" value="{{$tps->link}}" required="" autocomplete="off" class="form-control" placeholder="Link Lokasi">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Ketua TPS</h2>
                                            <input type="text" name="ketua" value="{{$tps->ketua}}" required="" autocomplete="off" class="form-control" placeholder="Ketua Penanggung Jawab" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="margin-top: 10px">
                                    <h2 class="card-inside-title">Foto Tempat Pemungutan Suara</h2>
                                    <div class="form-group">
                                        <a target="_blank" href="{{ asset('images/tps/'. $tps->foto) }}" data-sub-html="{{$tps->nama}}">
                                <img class="img-responsive thumbnail" width="40%" src="{{ asset('images/tps/'. $tps->foto) }}">
                                 </a>
                                        <div class="form-line">
                                            <input type="file" value="{{old('foto')}}" name="foto" placeholder="File Bukti">
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
                                        <a href="{{ route('tps') }}" class="btn btn-block btn-danger"><i class="material-icons">cancel</i> Batal</a>
                                    </div>
                                </div>
                            </div>
                            </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        @foreach ($data as $tps)
            {{-- expr --}}
        
        document.getElementById('desa').value='{{$tps->desa_id}}'
       $("#desa").select2({
         allowClear: true
       });
       @endforeach
    </script>
@endpush
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
                                VERIFIKASI TEMPAT PEMUNGUTAN SUARA
                            </h2>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Data Tempat</h2>
                            <form method="post" action="{{ route('verifed_tps', $data->id) }}" enctype="multipart/form-data">
                            	@csrf
                                <input type="text" hidden="" name="oleh" value="{{auth::user()->pengguna->nama}}" readonly="">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Nama</h2>
                                            <input type="text" name="nama" value="{{$data->nama}}" required="" autocomplete="off" class="form-control" readonly="" placeholder="Nama Tempat" />
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Alamat</h2>
                                            <input type="text" readonly="" name="alamat" value="{{$data->alamat}}" required="" autocomplete="off" class="form-control" placeholder="Alamat" />
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Berada di Desa</h2>
                                            <input type="text" readonly="" name="alamat" value="{{$data->desa->desa}}" required="" autocomplete="off" class="form-control" placeholder="Alamat" />
                                        </div>
                                    </div>
                                </div> 
                                 
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Petugas</h2>
                                            <input type="number" readonly="" readonly="" min="10" name="petugas" value="{{$data->petugas}}" required="" autocomplete="off" class="form-control" placeholder="Banyak Petugas" />
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
                                            <input type="number" min="3" name="pengawas" value="{{$data->pengawas}}" required="" readonly="" autocomplete="off" class="form-control" placeholder="Banyak Pengawas" />
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
                                        <input readonly="" type="number" name="luas" required="" value="{{$data->luas}}" autocomplete="" class="form-control" placeholder="Luas Lahan">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{-- <div class="form-line"> --}}
                                        <h2 class="card-inside-title">Link Lokasi</h2>
                                        <a href="{{$data->link}}" target="_blank" class="btn btn-block btn-info" type="button" style="text-decoration: none; margin-top: 13px"><i class="material-icons">place</i> Lihat Lokasi</a>
                                       {{--  <input type="url" name="link" value="{{$data->link}}" required="" autocomplete="off" class="form-control" placeholder="Link Lokasi"> --}}
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Ketua TPS</h2>
                                            <input type="text" readonly="" name="ketua" value="{{$data->ketua}}" required="" autocomplete="off" class="form-control" placeholder="Ketua Penanggung Jawab" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="margin-top: 10px">
                                    <h2 class="card-inside-title">Foto Tempat Pemungutan Suara</h2>
                                    <div class="form-group">
                                        <a target="_blank" href="{{ asset('images/tps/'. $data->foto) }}" data-sub-html="{{$data->nama}}">
                                <img class="img-responsive thumbnail" width="40%" src="{{ asset('images/tps/'. $data->foto) }}">
                                 </a>
                                        
                                        
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
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Pendata</h2>
                                            <input type="text" readonly="" name="ketua" value="{{$data->oleh}}" required="" autocomplete="off" class="form-control" placeholder="Ketua Penanggung Jawab" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="demo-radio-button">
                                        <h2 class="card-inside-title">Verifikasi Data Tempat Pemungutan Suara, Apakah TPS {{$data->nama}} Telah Memenuhi Syarat?</h2>
                                        <input name="status" value="ya" required="" type="radio" id="radio_4" class="with-gap" />
                                        <label  for="radio_4">Ya</label>
                                        <input name="status" value="tidak" required="" type="radio" id="radio_5" class="with-gap" />
                                        <label for="radio_5">Tidak</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Catatan</h2>
                                            <textarea rows="4" id="pesan" name="pesan" required="" autocomplete="off" class="form-control no-resize" placeholder="Tinggalkan Catatan"></textarea>
                                            @error('pesan')
                                        <div class="alert alert-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                        </div>
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
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $("[name='status']").change(function () {
            if($(this).val()=='ya'){
                $("#pesan").val("Data TPS Lengkap").attr('readonly', 'true')
            } else {
                 $("#pesan").val("").removeAttr('readonly');
            }
        })
    </script>
@endpush
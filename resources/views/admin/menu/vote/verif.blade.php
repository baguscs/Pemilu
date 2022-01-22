@extends('admin.master')
@section('konten')
	
    <section class="content">
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>VERIFIKASI DATA VOTERS</h2>
                        </div>
                        <div class="body">
                                <h2 class="card-inside-title">Data Voters</h2>
                            @foreach ($data as $row)
                            <form method="post" action="{{ route('voters_verified', $row->id) }}" enctype="multipart/form-data">
                            	@csrf
                                <input type="text" name="cek" value="{{auth::user()->pengguna->nama}}" hidden="">
                                <input type="number" name="id" value="{{$row->id}}" hidden="">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Nama</h2>
                                            <input type="text" name="nama" value="{{$row->nama}}" readonly="" required="" autocomplete="off" class="form-control" placeholder="Nama Calon Camat" />
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">NIK</h2>
                                            <input type="number" name="nik" value="{{$row->no_ket}}" readonly="" required="" autocomplete="off" class="form-control" placeholder="NIP" />
                                        </div>
                                    </div>
                                </div>  
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Asal Desa</h2>
                                            <input type="text" name="desa" readonly="" value="{{$row->desa->desa}}" required="" autocomplete="off" class="form-control" placeholder="Umur" />
                                        </div>
                                    </div>
                                </div>   
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Tanggal Lahir</h2>
                                            <input type="text" name="ttg" readonly="" value="{{$row->ttg}}" required="" autocomplete="off" class="form-control" placeholder="Umur" />
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Jenis Kelamin</h2>
                                            <input type="text" name="jkl" readonly="" value="{{$row->jkl}}" required="" autocomplete="off" class="form-control" /> 
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Kelurahan</h2>
                                            <input type="text" name="telp" readonly="" value="{{$row->kelurahan->nama}}" required="" autocomplete="off" class="form-control" /> 
                                        </div>
                                    </div> 
                                </div>
                                
                        </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">E-Mail</h2>
                                            <input type="text" name="email" readonly="" value="{{$row->email}}" required="" autocomplete="off" class="form-control" /> 
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Foto Kartu Tanda Penduduk</h2>
                                    <a target="_blank" href="{{ asset('images/vote/'. $row->bukti) }}" data-sub-html="{{$row->nama}}">
                                <img class="img-responsive thumbnail" width="90%" src="{{ asset('images/vote/'. $row->bukti) }}">
                                 </a>                              
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="demo-radio-button">
                                        <h2 class="card-inside-title">Verifikasi Data Voters, Apakah Voters {{$row->nama}} Telah Memenuhi Syarat?</h2>
                                        <input name="status" value="ya" type="radio" id="radio_4" class="with-gap" />
                                        <label for="radio_4">Ya</label>
                                        <input name="status" value="tidak" type="radio" id="radio_5" class="with-gap" />
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
                                        <a href="{{ route('vote') }}" class="btn btn-block btn-danger"><i class="material-icons">cancel</i> Batal</a>
                                    </div>
                                </div>
                            </div>
                            </form>
                        @endforeach
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
                $("#pesan").val("Data Voters Lengkap").attr('readonly', 'true')
            } else {
                 $("#pesan").val("").removeAttr('readonly');
            }
        })
       $("#desa").select2({
         allowClear: true
       });
    </script>
@endpush
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
                                VERIFIKASI DATA CALON CAMAT
                            </h2>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Data Calon Camat</h2>
                            @foreach ($data as $verif)
                            <form method="post" action="{{ route('camat_verified', $verif->id) }}" enctype="multipart/form-data">
                            	@csrf
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <center>
                                    <h2 class="card-inside-title">Pas Foto Calon</h2>
                                    <a target="_blank" href="{{ asset('images/camat/'. $verif->foto) }}" data-sub-html="{{$verif->nama}}">
                                        <img class="img-responsive thumbnail" width="50%" src="{{ asset('images/camat/'. $verif->foto) }}">
                                    </a>
                                    </center>                              
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Nama</h2>
                                            <input type="text" name="nama" value="{{$verif->nama}}" readonly="" required="" autocomplete="off" class="form-control" placeholder="Nama Calon Camat" />
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">NIP</h2>
                                            <input type="number" name="nip" value="{{$verif->nip}}" readonly="" required="" autocomplete="off" class="form-control" placeholder="NIP" />
                                        </div>
                                    </div>
                                </div>  
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Umur</h2>
                                            <input type="number" name="umur" readonly="" value="{{$verif->umur}}" required="" autocomplete="off" class="form-control" placeholder="Umur" />
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Jenis Kelamin</h2>
                                            <input type="text" name="jkl" readonly="" value="{{$verif->jkl}}" required="" autocomplete="off" class="form-control" /> 
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Agama</h2>
                                            <input type="text" name="agama" readonly="" value="{{$verif->agama}}" required="" autocomplete="off" class="form-control" /> 
                                        </div>
                                    </div> 
                                </div>
                                
                        </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                     <div class="form-group">
                                        <div class="form-line">
                                            <h2 style="margin-bottom: 19px" class="card-inside-title">Pengalaman 3 Tahun Pemerintahan</h2>
                                                @if ($verif->kontribusi == 'ya')
                                                <input type="checkbox" id="basic_checkbox_4" class="filled-in chk-col-green" checked disabled /><label for="basic_checkbox_4">Ya</label>
                                                @elseif($verif->kontribusi == 'tidak')
                                                <input type="checkbox" id="basic_checkbox_4" class="filled-in chk-col-red" checked disabled /><label for="basic_checkbox_4">Tidak</label>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                     <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Pengalaman Terkhir</h2>
                                            <input type="text" name="pengalaman" autocomplete="off" class="form-control" placeholder="Pengalaman Terkhir Anda" required="" value="{{$verif->ex}}">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-sm-6" >
                                    <h2 class="card-inside-title">Scan Ijazah Terakhir</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <a href="{{ asset('storage/'. $verif->ijazah) }}" target="_blank">
                                            <input type="text" readonly="" name="ijazah" class="form-control" value="{{$verif->ijazah}}">
                                            </a>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-6" >
                                    <h2 class="card-inside-title">Surat Keterangan Catatan Kepolisian</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <a href="{{ asset('storage/'. $verif->skck) }}" target="_blank">
                                            <input type="text" readonly="" name="skck" class="form-control" value="{{$verif->skck}}">
                                            </a>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Foto Visi</h2>
                                    <a target="_blank" href="{{ asset('images/visi/'. $verif->visi) }}" data-sub-html="{{$verif->nama}}">
                                <img class="img-responsive thumbnail" width="90%" src="{{ asset('images/visi/'. $verif->visi) }}">
                                 </a>                              
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Foto Misi</h2>
                                    <a target="_blank" href="{{ asset('images/misi/'. $verif->misi) }}" data-sub-html="{{$verif->nama}}">
                                <img class="img-responsive thumbnail" width="90%" src="{{ asset('images/misi/'. $verif->misi) }}">
                                 </a>                                 
                                </div>
                            </div>
                            <div class=" row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Pendata</h2>
                                    <div class="form-group">
                                        <div class="form-line ">
                                            <input type="text" name="" class="form-control" disabled="" value="{{$verif->oleh}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Waktu</h2>
                                    <div class="form-group">
                                        <div class="form-line ">
                                            <input type="text" name="" class="form-control" disabled="" value="{{$verif->created_at}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="demo-radio-button">
                                        <h2 class="card-inside-title">Verifikasi Data Calon Camat, Apakah Calon {{$verif->nama}} Telah Memenuhi Syarat?</h2>
                        
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
                                        <a href="{{ route('camat') }}" class="btn btn-block btn-danger"><i class="material-icons">cancel</i> Batal</a>
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
                $("#pesan").val("Data Calon Camat Lengkap").attr('readonly', 'true')
            } else {
                 $("#pesan").val("").removeAttr('readonly');
            }
        })
       $("#desa").select2({
         allowClear: true
       });
    </script>
@endpush
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
                                EDIT DATA CALON LURAH
                            </h2>
                        </div>
                        <div class="body">
                            @foreach ($data as $calon)
                            <h2 class="card-inside-title">Data Calon LURAH</h2>
                            <form method="post" action="{{ route('ganti_lurah', $calon->id) }}" enctype="multipart/form-data">
                            	@csrf
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Nama</h2>
                                            <input type="text" name="nama" value="{{$calon->nama}}" required="" autocomplete="off" class="form-control" placeholder="Nama Calon Camat" />
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">NIP</h2>
                                            <input type="number" name="nip" value="{{$calon->nip}}" required="" autocomplete="off" class="form-control" placeholder="NIP" />
                                        </div>
                                        @error('nip')
                                        <div class="alert alert-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>  
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Alamat</h2>
                                            <input type="text" name="alamat" value="{{$calon->alamat}}" required="" autocomplete="off" class="form-control" placeholder="Umur" />
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Umur</h2>
                                            <input type="number" name="umur" value="{{$calon->umur}}" required="" autocomplete="off" class="form-control" placeholder="Umur" />
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Jenis Kelamin</h2>
                                    <select name="jkl" id="jkl" required="" class="form-control show-tick">
                                        <option value="{{old('jkl')}}">-- Silahkan Pilih --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Agama</h2>
                                    <select name="agama" id="agama" required="" class="form-control show-tick">
                                        <option value="{{old('agama')}}">-- Silahkan Pilih --</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindhu">Hindhu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Katolik">Katolik</option>
                                    </select>
                                </div>
                                
                        </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="demo-radio-button">
                                        <h2 class="card-inside-title">Apakah anda memiliki pengalaman 3 tahun atau lebih di Pemerintahan Kelurahan/Kecamatan ?</h2>
                                        <input type="radio" class="with-gap" id="radio_4" name="kontribusi" value="ya" @if ($calon->kontribusi == 'ya')
                                            checked 
                                        @endif>
                                        <label for="radio_4">Ya</label>
                                        <input name="kontribusi" value="tidak" type="radio" id="radio_5" class="with-gap" @if ($calon->kontribusi == 'tidak')
                                            checked 
                                        @endif >
                                        <label for="radio_5">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                     <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title" style="margin-bottom: 27px">Pengalaman Terkhir</h2>
                                            <input id="pengalaman" type="text" name="ex" autocomplete="off" class="form-control" placeholder="Pengalaman Terkhir Anda"  value="{{$calon->ex}}">
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-sm-6" >
                                    <h2 class="card-inside-title" style="margin-bottom: 19px">Scan Ijazah Terakhir</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <a href="{{ asset('storage/'. $calon->ijazah) }}" target="_blank">{{$calon->ijazah}}</a>
                                            <input type="file" value="{{old('ijazah')}}" name="ijazah" placeholder="File Bukti">
                                        </div>
                                        <div class="help-info">
                                            File harus berextensi PDF
                                            <p>Ukuran File Maximal : 750KB</p>
                                        </div>
                                        @error('ijazah')
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
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Pas Foto Calon</h2>
                                    <a target="_blank" href="{{ asset('images/lurah/'. $calon->foto) }}" data-sub-html="{{$calon->nama}}">
                                <img class="img-responsive thumbnail" width="20%" src="{{ asset('images/lurah/'. $calon->foto) }}">
                                 </a>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" value="{{old('foto')}}" name="foto" placeholder="File Bukti">
                                        </div>
                                        <div class="help-info">
                                            File harus berextensi JPG/JPEG
                                            <p>Ukuran File Maximal : 300KB</p>
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
                                    <h2 class="card-inside-title">Scan SKCK</h2>
                                    <a href="{{ asset('storage/'. $calon->skck) }}" target="_blank">{{$calon->skck}}</a>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" value="{{old('skck')}}" name="skck" placeholder="File Bukti">
                                        </div>
                                        <div class="help-info">
                                            File harus berextensi PDF
                                            <p>Ukuran File Maximal : 750KB</p>
                                        </div>
                                        @error('skck')
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
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Tujuan Pencalonan</h2>
                                    <select id="tujuan" name="tujuan" required="" class="form-control">
                                        <option value="{{old('tujuan')}}">-- Silahkan Pilih --</option>
                                        @foreach ($lurah as $p)
                                            <option value="{{$p->id}}">{{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6" style="margin-top: 5px">
                                    <h2 class="card-inside-title">Scan Akta Kelahiran</h2>
                                    <a href="{{ asset('storage/'. $calon->akta) }}" target="_blank">{{$calon->akta}}</a>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" value="{{old('akta')}}" name="akta" placeholder="File Bukti">
                                        </div>
                                        <div class="help-info">
                                            File harus berextensi PDF
                                            <p>Ukuran File Maximal : 750KB</p>
                                        </div>

                                        @error('akta')
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
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Foto Visi</h2>
                                    <a target="_blank" href="{{ asset('images/visi/'. $calon->visi) }}" data-sub-html="{{$calon->nama}}">
                                <img class="img-responsive thumbnail" width="20%" src="{{ asset('images/visi/'. $calon->visi) }}">
                                 </a>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" value="{{old('visi')}}" name="visi" placeholder="File Bukti">
                                        </div>
                                        <div class="help-info">
                                            File harus berextensi JPG/JPEG
                                            <p>Ukuran File Maximal : 300KB</p>
                                        </div>
                                        @error('visi')
                                        <br>
                                        <br>
                                        <div class="alert alert-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>                                    
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Foto Misi</h2>
                                    <a target="_blank" href="{{ asset('images/misi/'. $calon->misi) }}" data-sub-html="{{$calon->nama}}">
                                <img class="img-responsive thumbnail" width="20%" src="{{ asset('images/misi/'. $calon->misi) }}">
                                 </a>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" value="{{old('misi')}}" name="misi" placeholder="File Bukti">
                                        </div>
                                        <div class="help-info">
                                            File harus berextensi JPG/JPEG
                                            <p>Ukuran File Maximal : 300KB</p>
                                        </div>
                                        @error('misi')
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
                                        <a href="{{ route('lurah') }}" class="btn btn-block btn-danger"><i class="material-icons">cancel</i> Batal</a>
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
        @foreach ($data as $element)
        
        document.getElementById('jkl').value='{{$element->jkl}}';
        document.getElementById('agama').value='{{$element->agama}}';
        
        @endforeach
    </script>
    <script>
         $("[name='kontribusi']").change(function () {
            if($(this).val()=='tidak'){
                $("#pengalaman").val("Tidak Ada").attr('readonly', 'true')
            } else {
                 $("#pengalaman").val("").removeAttr('readonly');
            }
        })
       $("#tujuan").select2({
         allowClear: true
       });
    </script>
@endpush
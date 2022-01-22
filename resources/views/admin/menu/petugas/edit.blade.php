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
                                EDIT PEGAWAI
                            </h2>
                        </div>
                        <div class="body">
                            @foreach ($data as $office)
                                
                            <h2 class="card-inside-title">Data Pegawai</h2>
                            <form method="post" action="{{ route('ganti_pegawai', $office->id) }}" enctype="multipart/form-data">
                            	@csrf
                                @if ($office->role_id == 2)
                                    <input type="number" name="role" value="2" hidden="">
                                @elseif($office->role_id == 1)
                                    <input type="number" name="role" value="1" hidden="">
                                @endif
                            	
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Nama</h2>
                                            <input type="text" name="nama" value="{{$office->nama}}" required="" autocomplete="off" class="form-control" placeholder="Nama Petugas" />
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">NIP</h2>
                                            <input type="number" name="nip" value="{{$office->no_ket}}" required="" autocomplete="off" class="form-control" placeholder="NIP" />
                                        </div>
                                        @error('no_ket')
                                        <div class="alert alert-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                @if ($office->role_id == 1)
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Asal</h2>
                                            <input type="text" name="asal" value="{{$office->asal}}" required="" autocomplete="off" class="form-control" placeholder="Nama Petugas"  readonly="" />
                                        </div>
                                    </div>
                                </div>
                                @else
                                 <div class="col-sm-6">
                                    <h2 class="card-inside-title">Asal Instansi</h2>
                                    <select id="asal" name="asal" required="" class="form-control">
                                        <option value="{{old('asal')}}">-- Silahkan Pilih --</option>
                                        @foreach ($lurah as $p)
                                            <option value="{{$p->nama}}">Kelurahan {{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif   
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Status</h2>
                                    <select id="status" name="status" required="" class="form-control show-tick">
                                        <option value="">-- Silahkan Pilih --</option>
                                            <option value="ya">Aktif</option>
                                            <option value="tidak">Diblokir</option>
                                    </select>
                                </div>
                                
                                <div class="col-sm-6" style="margin-top: 10px">
                                    <h2 class="card-inside-title">Foto Pegawai</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <a target="_blank" href="{{ asset('images/pegawai/'. $office->foto) }}" data-sub-html="{{$office->nama}}">
                                <img class="img-responsive thumbnail" width="20%" src="{{ asset('images/pegawai/'. $office->foto) }}">
                                 </a>
                                            <input type="file" value="{{old('foto')}}" name="foto" placeholder="File">
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
            {{-- expr --}}
        if ({{$element->role_id}} == 2) {
            document.getElementById('asal').value='{{$element->asal}}';
        }
         document.getElementById('status').value='{{$element->status}}';
         
       $("#asal").select2({
         allowClear: true
       });

        @endforeach
    </script>
@endpush
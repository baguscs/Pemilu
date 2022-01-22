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
                                EDIT VOTERS
                            </h2>
                        </div>
                        <div class="body">
                        @foreach ($data as $vote)
                            <h2 class="card-inside-title">Data Voters</h2>
                            <form method="post" action="{{ route('ganti_voters', $vote->id) }}" enctype="multipart/form-data">
                            	@csrf
                                <input type="number" name="role" value="{{$vote->role_id}}" hidden="">
                                <input type="text" name="cek" value="{{auth::user()->pengguna->nama}}" hidden="">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Nama</h2>
                                            <input type="text" name="nama" value="{{$vote->nama}}" required="" autocomplete="off" class="form-control" placeholder="Nama Voters" />
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">NIK</h2>
                                            <input type="text" name="no_ket" value="{{$vote->no_ket}}" required="" autocomplete="off" class="form-control" placeholder="NIK" />
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
                                            <input type="email" name="email" value="{{$vote->email}}" required="" autocomplete="off" class="form-control" placeholder="E-Mail" />
                                        </div>
                                    </div>
                                </div> 
                               
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Jenis Kelamin</h2>
                                    <select id="jkl" name="jkl" required="" class="form-control show-tick">
                                        <option value="{{old('jkl')}}" disabled="">-- Silahkan Pilih --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Kelurahan</h2>
                                    <select id="kelurahan" name="lurah" required="" class="form-control show-tick">
                                        <option value="{{old('lurah')}}">-- Silahkan Pilih --</option>
                                        @foreach ($lurah as $row)
                                            <option value="{{$row->id}}">{{$row->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Asal Desa</h2>
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
                                    <h2 class="card-inside-title">Tanggal Lahir</h2>
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="text" value="{{$vote->ttg}}" autocomplete="off" name="ttg" required="" class="form-control" placeholder="Silahkan Pilih Tanggal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="margin-top: 10px">
                                    <h2 class="card-inside-title">Foto Kartu Tanda Penduduk</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" value="{{old('bukti')}}" name="bukti"  placeholder="File Bukti">
                                        </div>
                                        <div class="help-info">
                                            File harus berextensi JPG/JPEG
                                        </div>
                                        @error('bukti')
                                        <div class="alert alert-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div> 
                                     <a target="_blank" href="{{ asset('images/vote/'. $vote->bukti) }}" data-sub-html="{{$vote->nama}}">
                                <img class="img-responsive thumbnail" width="50%" src="{{ asset('images/vote/'. $vote->bukti) }}">
                                 </a>                                   
                                </div>
                            </div>
                            @if (auth::user()->pengguna->role_id == 1)
                                <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="demo-radio-button">
                                        <h2 class="card-inside-title">Kelengkapan</h2>
                                        <input name="status" value="ya" type="radio" id="radio_4" class="with-gap" />
                                        <label for="radio_4">Lengkap</label>
                                        <input name="status" value="tidak" type="radio" id="radio_5" class="with-gap" />
                                        <label for="radio_5">Kurang</label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <h2 class="card-inside-title">Catatan</h2>
                                            <textarea rows="4" id="pesan" name="pesan" required="" autocomplete="off" class="form-control no-resize" placeholder="Tinggalkan Catatan"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="basic_checkbox_2" class="filled-in" required="" />
                                        <label for="basic_checkbox_2">Saya telah memahami dan memeriksa tentang kebenaran data diatas, serta saya mengerti bahwa validasi data ini hanya bisa satu kali saja dan saya akan bertanggung jawab jika ada kesalahan.</label>
                                    </div>
                                </div>
                            </div>
                            @endif
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
        @foreach ($data as $element)
        var lurah = document.getElementById('kelurahan').value='{{$element->kelurahan_id}}';
         var jkl = document.getElementById('jkl').value='{{$element->jkl}}';
         var desa = document.getElementById('desa').value='{{$element->desa_id}}';
         
         // console.log(lurah);
         // var data = lurah[0];
         // document.getElementsByTagName('')
         
        @endforeach
    </script>
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
       $("#kelurahan").select2({
         allowClear: true
       });
    </script>
@endpush
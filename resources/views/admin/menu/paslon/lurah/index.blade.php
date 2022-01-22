@extends('admin.master')
@section('konten')
        <section class="content">
        <div class="container-fluid">
            <!-- Widgets -->

                       <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <p style="font-size: 19px">DATA CALON LURAH
                                    @if (auth::user()->pengguna->role_id == 1)
                                        <a href="{{ route('tambah_lurah') }}" title="Tambah Calon" class="btn btn-success" style="float: right;"><i class="material-icons">
                            add</i></a>
                                    @endif
                            
                            </p>
                             @if ($messege = Session::get("pesan"))
                             <div style="margin-top: 15px" class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ Session::get("pesan") }}
                            </div>
                             @endif
                             @if (auth::user()->pengguna->role_id == 3)
                             <div class="row clearfix">
                                <div class="col-sm-12">
                                    @foreach ($status as $p)
                                    <form method="post" action="{{ route('status_lurah', $p->id) }}">
                                @csrf
                                    <div class="demo-radio-button">
                                        <h2 style="margin-bottom: 10px" class="card-inside-title">Status Pendaftaran Calon Lurah</h2>
                                        
                                        <input name="status" value="buka" type="radio" id="radio_4" class="with-gap" @if ($p->status == "buka")
                                            checked="" 
                                        @endif/>
                                        <label for="radio_4">Buka</label>
                                        <input name="status" value="tutup" type="radio" id="radio_5" class="with-gap" @if ($p->status == "tutup")
                                            checked="" 
                                        @endif />
                                        <label for="radio_5">Tutup</label>
                                       
                                        <button type="submit" class="btn btn-info btn-circle waves-effect waves-circle waves-float"><i class="material-icons">lock</i></button>
                                    </div>
                                </form>
                                 @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="20px">No. Urut</th>
                                            <th width="150px">Nama</th>
                                            <th>NIP</th>
                                            <th width="50px">Tujuan</th>
                                            <th style="width: 50px">Pengalaman</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($data as $p)
                                        <tr>
                                            <td>
                                                @if ($p->norut == null && auth::user()->pengguna->role_id == 3 && $p->status == "ya")
                                                <button style="margin-left: 6px" title="Masukkan Nomor Urut" type="button" class="btn btn-warning btn-circle waves-effect waves-float" data-toggle="modal" data-target="#defaultModal{{$loop->iteration}}"><i class="material-icons">new_releases</i></button>

                                                 <div class="modal fade" id="defaultModal{{$loop->iteration}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="defaultModalLabel">Input Nomor Urut Calon Lurah</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="media">
                                                                    <div class="media-left media-middle">
                                                                        <a target="_blank" href="{{ asset('images/lurah/'. $p->foto) }}">
                                                                            <img class="media-object" src="{{ asset('images/lurah/'. $p->foto) }}" width="100" height="80">
                                                                        </a>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h4 style="margin-bottom: 20px" class="media-heading">{{$p->nama}}</h4>
                                                                        <form action="{{ route('norut_lurah', $p->id) }}" method="post">
                                                                            @csrf
                                                                            <div class="row clearfix">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <h2 class="card-inside-title">NIP</h2>
                                                                                        <input type="text" name="nama" value="{{$p->nip}}" required="" autocomplete="off" class="form-control" readonly="" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <h2 class="card-inside-title">Nomor Urut Calon</h2>
                                                                                        <input type="number" name="norut" class="form-control" autocomplete="off">
                                                                                    </div>
                                                                                    @error('norut')
                                                                                    <div class="alert alert-danger" role="alert">
                                                                                     <strong>{{ $message }}</strong>
                                                                                    </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">BATAL</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                @if ($p->norut == null && $p->status != "tidak")
                                                    New Data
                                                    @elseif($p->status == "tidak")
                                                    Gagal
                                                    @else
                                                    {{$p->norut}}
                                                @endif
                                                
                                            @endif
                                            </td>
                                            <td>{{$p->nama}}</td>
                                            <td>{{$p->nip}}</td>
                                            <td>Kelurahan {{$p->kelurahan->nama}}</td>
                                            <td>{{$p->ex}}</td>
                                            <td>
                                                @if ($p->status == Null)
                                                     <button style="width: 100px" type="button" class="btn btn-warning waves-effect" data-trigger="focus" data-container="body" data-toggle="popover"
                                                    data-placement="bottom" title="Pesan" data-content="{{$p->pesan}} "><i class="material-icons">alarm</i> Pending
                                                </button>
                                                    
                                                @elseif($p->status == "ya")
                                                    <button style="width: 100px" type="button" class="btn btn-success waves-effect" data-trigger="focus" data-container="body" data-toggle="popover"
                                                    data-placement="bottom" title="Pesan" data-content="{{$p->pesan}}"><i class="material-icons">done</i> Terdaftar</button>
                                                @else
                                                    <button style="width: 100px" type="button" class="btn btn-danger waves-effect" data-trigger="focus" data-container="body" data-toggle="popover"
                                                    data-placement="bottom" title="Pesan" data-content="{{$p->pesan}}"><i class="material-icons">cancel</i> Gagal</button>
                                                @endif
                                            </td>
                                            <td>

                                                 &nbsp; 
                                                 @if ($p->status == "ya" || $p->status == "tidak" || auth::user()->pengguna->role_id == 2)
                                                     <button type="button" style="width: 90px;height: 35px" title="Info" data-color="light-blue" class="btn bg-light-blue waves-effect waves-float"  data-toggle="modal" data-target="#largeModal{{$loop->iteration}}"><i class="material-icons">info</i></button>

                                                  <div class="modal fade" id="largeModal{{$loop->iteration}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="largeModalLabel">Detail Data Calon</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row clearfix">
                                                                    
                                                                    @csrf  
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <h2 class="card-inside-title">Nama</h2>
                                                                            <input type="text" name="nama" value="{{$p->nama}}" required="" autocomplete="off" class="form-control" readonly="" />
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <h2 class="card-inside-title">NIP</h2>
                                                                            <input type="text" name="no_ket" value="{{$p->nip}}" required="" autocomplete="off" class="form-control" readonly="" />
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <h2 class="card-inside-title">Alamat</h2>
                                                                            <input type="text" name="telpon" value="{{$p->alamat}}" required="" autocomplete="off" class="form-control" readonly="" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <h2 class="card-inside-title">Umur</h2>
                                                                            <input type="text" name="telpon" value="{{$p->umur}}" required="" autocomplete="off" class="form-control" readonly="" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                    <h2 class="card-inside-title">Agama</h2>
                                                                   <input type="text" name="desa" readonly="" value="{{$p->agama}}" class="form-control">
                                                                   </div>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <h2 class="card-inside-title">Jenis Kelamin</h2>
                                                                            <input type="text" name="jkl" value="{{$p->jkl}}" class="form-control" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <h2 class="card-inside-title">Pengalaman 3 Tahun Pemerintahan</h2>
                                                                            @if ($p->kontribusi == 'ya')
                                                                           <input type="checkbox" id="basic_checkbox_4" class="filled-in chk-col-green" checked disabled /><label for="basic_checkbox_4">Ya</label>
                                                                           @elseif($p->kontribusi == 'tidak')
                                                                          <input type="checkbox" id="basic_checkbox_4" class="filled-in chk-col-red" checked disabled /><label for="basic_checkbox_4">Tidak</label>
                                                                           @endif
                                                                        </div>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                        <div class="row clearfix">
                                                            <div class="col-sm-6">
                                                                <h2 class="card-inside-title">Tujuan Penalonan</h2>
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" name="" class="form-control" value=" Kelurahan {{$p->kelurahan->nama}}" readonly="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <h2 class="card-inside-title">Pengalaman</h2>
                                                            <div class="form-group">
                                                                <div class="form-line" >
                                                                    <input id="ttg" type="text" autocomplete="off" name="ttg" required="" class="form-control" value="{{$p->ex}}" readonly="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h2 class="card-inside-title">Foto Calon</h2>
                                                               <a target="_blank" href="{{ asset('images/lurah/'. $p->foto) }}" data-sub-html="{{$p->nama}}">
                                                        <img class="img-responsive thumbnail" width="30%" src="{{ asset('images/lurah/'. $p->foto) }}">
                                                         </a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h2 class="card-inside-title">Ijazah</h2>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                   <a href="{{ asset('storage/'. $p->ijazah) }}" >{{$p->ijazah}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h2 class="card-inside-title">Surat Keterangan Catatan Kepolisian</h2>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                   <a href="{{ asset('storage/'. $p->skck) }}" >{{$p->skck}}</a>
                                                                </div>
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="row clearfix">
                                                         <div class="col-sm-6">
                                                            <h2 class="card-inside-title">Foto Visi</h2>
                                                                 <a target="_blank" href="{{ asset('images/visi/'. $p->visi) }}" data-sub-html="{{$p->visi}}">
                                                        <img class="img-responsive thumbnail" width="90%" src="{{ asset('images/visi/'. $p->visi) }}">
                                                         </a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h2 class="card-inside-title">Foto Misi</h2>
                                                                 <a target="_blank" href="{{ asset('images/misi/'. $p->misi) }}" data-sub-html="{{$p->nama}}">
                                                        <img class="img-responsive thumbnail" width="90%" src="{{ asset('images/misi/'. $p->misi) }}">
                                                         </a>
                                                        </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="material-icons">cancel</i> Tutup</button>
                                                            </div>

                                                    @elseif(auth::user()->pengguna->role_id == 3 && $p->status == Null)

                                                     @php
                                                        $parameter = [
                                                            'id' => $p->id,
                                                         ];
                                                         $id = Crypt::encrypt($parameter);
                                                    @endphp
                                                    <a href="{{ route('verif_lurah', $id) }}" style="width: 90px;height: 35px" type="button" class="btn bg-blue waves-effect waves-float"><i class="material-icons">verified_user</i></a>

                                                     @else
                                                     @php
                                                        $parameter = [
                                                            'id' => $p->id,
                                                         ];
                                                         $id = Crypt::encrypt($parameter);
                                                    @endphp
                                                     
                                                      <a href="{{ route('edit_lurah', $id) }}" title="Edit Lurah" class="btn btn-primary waves-effect waves-float" ><i class="material-icons">create</i></a>  
                                                      
                                                     <button type="button" data-color="red" class="btn bg-red waves-effect waves-float" data-toggle="modal" data-target="#defaultModal{{$loop->iteration}}" title="Hapus"><i class="material-icons">delete</i></button>

                                                <div class="modal fade" id="defaultModal{{$loop->iteration}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button style="float: right; width: 50px" type="button" class="btn btn-link waves-effect" data-dismiss="modal"><i class="material-icons">clear</i></button>
                                                                <h4 class="modal-title" id="defaultModalLabel">Hapus Calon</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                               Anda Yakin ingin menghapus Calon Lurah {{$p->nama}} ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('hapus_lurah', $p->id) }}" method="post">
                                                                    @csrf
                                                                    
                                                                <button class="btn btn-danger waves-effect">
                                                                    HAPUS
                                                                </button>
                                                                </form>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- #END# Task Info -->
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

@endsection
@push('js')
    <script type="text/javascript">
        @foreach ($data as $p)
            //  document.getElementById('desa').value='{{$p->desa_id}};'
             document.getElementById('jkl').value='{{$p->jkl}}'; 
             document.getElementById('ttg').value='{{$p->ttg}}';
        @endforeach
       
    </script>
    <script>
        $("#desa").select2({
            allowClear: true
        });
    </script>
@endpush

@extends('admin.master')
@section('konten')
        <section class="content">
        <div class="container-fluid">
            <!-- Widgets -->

                       <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <p style="font-size: 19px">DATA PEMILIK HAK SUARA
                                    @if (auth::user()->pengguna->role_id == 2)
                                        <a href="{{ route('tambah_vote') }}" title="Tambah Voters" class="btn btn-success" style="float: right;"><i class="material-icons">
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
                                    <form method="post" action="{{ route('status_vote', $p->id) }}">
                                @csrf
                                    <div class="demo-radio-button">
                                        <h2 style="margin-bottom: 10px" class="card-inside-title">Status Pendaftaran Voters</h2>
                                        
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
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>E-Mail</th>
                                            <th>Asal Desa</th>
                                            <th>Status</th>
                                            <th width="90px">Opsi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($data as $p)
                                        <tr>
                                            <td>{{$p->nama}}</td>
                                            <td>{{$p->no_ket}}</td>
                                            <td>{{$p->email}}</td>
                                            <td>{{$p->desa->desa}}</td>
                                            <td>
                                                @if ($p->status == Null)
                                                     <button style="width: 100px" type="button" class="btn btn-warning waves-effect" data-trigger="focus" data-container="body" data-toggle="popover"
                                                    data-placement="bottom" title="Pesan" data-content="{{$p->pesan}}"><i class="material-icons">alarm</i> Pending</button>
                                                    
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
                                                 @if ($p->status == "ya" || $p->status == "tidak" || auth::user()->pengguna->role_id == 3)
                                                     <button type="button" title="Info" style="width: 90px;height: 35px" data-color="light-blue" class="btn bg-light-blue"  data-toggle="modal" data-target="#largeModal{{$loop->iteration}}"><i class="material-icons">info</i></button>

                                                  <div class="modal fade" id="largeModal{{$loop->iteration}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="largeModalLabel">Detail Data Voters</h4>
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
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <h2 class="card-inside-title">NIK</h2>
                                                                            <input type="text" name="no_ket" value="{{$p->no_ket}}" required="" autocomplete="off" class="form-control" readonly="" />
                                                                        </div>
                                                                        @error('no_ket')
                                                                        <div class="alert alert-danger" role="alert">
                                                                         <strong>{{ $message }}</strong>
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div> 
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <h2 class="card-inside-title">Kelurahan</h2>
                                                                            <input type="text" name="telpon" value="{{$p->kelurahan->nama}}" required="" autocomplete="off" class="form-control" readonly="" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                    <h2 class="card-inside-title">Asal Desa</h2>
                                                                   <input type="text" name="desa" readonly="" value="{{$p->desa->desa}}" class="form-control">
                                                                   </div>
                                                                   </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                    <h2 class="card-inside-title">Jenis Kelamin</h2>
                                                                    <input type="text" name="jkl" value="{{$p->jkl}}" class="form-control" readonly="">
                                                                </div>
                                                                </div>
                                                                </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                        <div class="col-sm-6">
                                                            <h2 class="card-inside-title">Tanggal Lahir</h2>
                                                            <div class="form-group">
                                                                <div class="form-line" >
                                                                    <input id="ttg" type="text" autocomplete="off" name="ttg" required="" class="form-control" value="{{$p->ttg}}" readonly="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6" style="margin-top: 10px">
                                                            <h2 class="card-inside-title">Foto Kartu Tanda Penduduk</h2>
                                                            <a target="_blank" href="{{ asset('images/vote/'. $p->bukti) }}" data-sub-html="{{$p->nama}}">
                                                        <img class="img-responsive thumbnail" width="50%" src="{{ asset('images/vote/'. $p->bukti) }}">
                                                         </a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h2 class="card-inside-title">Di Validasi Oleh</h2>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" value="{{$p->cek}}" readonly="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="material-icons">cancel</i> Tutup</button>
                                                            </div>

                                                            </form>
                                                     @elseif(auth::user()->pengguna->role_id == 1 && $p->status == Null)
                                                      @php
                                                            $parameter = [
                                                            '   id' => $p->id,
                                                            ];
                                                            $id = Crypt::encrypt($parameter);
                                                        @endphp
                                                      <a href="{{ route('verif_voters', $id) }}" title="Verifikasi Voters" style="width: 90px;height: 35px" type="button" class="btn bg-blue waves-effect waves-float"><i class="material-icons">verified_user</i></a>
                                                     @else
                                                        @php
                                                            $parameter = [
                                                            '   id' => $p->id,
                                                            ];
                                                            $id = Crypt::encrypt($parameter);
                                                        @endphp

                                                     <a href="{{ route('edit_voters', $id) }}" title="Edit Voters" class="btn btn-primary" ><i class="material-icons">create</i></a>
                                                 
                                                     <button style="width: 45px;height: 35px" type="button" data-color="red" class="btn bg-red waves-effect" data-toggle="modal" data-target="#defaultModal{{$loop->iteration}}" title="Hapus"><i class="material-icons">delete</i></button>

                                                <div class="modal fade" id="defaultModal{{$loop->iteration}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button style="float: right;" type="button" class="btn btn-link waves-effect" data-dismiss="modal"><i class="material-icons">clear</i></button>
                                                                <h4 class="modal-title" id="defaultModalLabel">Hapus Hak Pemilih</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                               Anda Yakin ingin menghapus Hak pilih {{$p->nama}} ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('hapus_voters', $p->id) }}" method="post">
                                                                    @csrf
                                                                <button class="btn btn-danger waves-effect">HAPUS   
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
             document.getElementById('desa').value='{{$p->desa_id}};'
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

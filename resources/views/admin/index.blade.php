@extends('admin.master')

@push("css")
    <link rel="icon" href="{{ asset('images/pemilu.ico') }}">

@endpush
@section('konten')
        <section class="content">
        <div class="container-fluid">
            @if ($messege = Session::get("notif"))
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ Session::get("notif") }}
                </div>
            @endif
           
            <div class="block-header">
                <h2>DATA STATISTIK PEMILU</h2>
                {{-- @php
                    echo date('m/d/Y');
                @endphp --}}
            </div>
            
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('vote') }}" style="text-decoration: none" type="button">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">book</i>
                        </div>
                        <div class="content">
                            <div class="text">VOTERS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><p>{{$vote->count()}}</p></div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('camat') }}" style="text-decoration: none">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">CAMAT</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><p>{{$camat->count()}}</p></div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('lurah') }}" style="text-decoration: none">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">LURAH</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><p>{{$lurah->count()}}</p></div>
                        </div>
                    </div>
                    </a>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('tps') }}" style="text-decoration: none">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">map</i>
                        </div>
                        <div class="content">
                            <div class="text">TPS</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><p>{{$tps->count()}}</p></div>
                        </div>
                    </div>
                    </a>
                </div>
                @if (auth::user()->pengguna->role_id == 3)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('pegawai') }}" style="text-decoration: none;">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_ind</i>
                        </div>
                        <div class="content">
                            <div class="text">PEGAWAI</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><p>{{$pegawai->count()}}</p></div>
                        </div>
                    </div>
                    </a>
                </div>
                @endif
                
            </div>
            <!-- #END# Widgets -->

                       <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <p style="font-size: 19px;">FASILITAS PEMUNGUTAN SUARA
                                    @if (auth::user()->pengguna->role_id == 1)
                            <a href="{{ route('tambah_fasilitas') }}" title="Tambah Fasilitas" class="btn btn-success" style="float: right;"><i class="material-icons">
                            add</i></a>
                            </p>
                             @endif
                            
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
                                    <form method="post" action="{{ route('status_fasilitas', $p->id) }}">
                                @csrf
                                    <div class="demo-radio-button">
                                        <h2 style="margin-bottom: 10px" class="card-inside-title">Status Pendataan Fasilitas</h2>
                                        
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
                                            <th>Jenis Fasilitas</th>
                                            <th>Kebutuhan</th>
                                            <th>Tersedia</th>
                                            <th>Kerusakan</th>
                                            <th width="110px">Status</th>
                                            <th width="20px">Keterangan</th>
                                            @if (Auth::user()->pengguna->role_id == 1)
                                            	<th>Opsi</th>
                                            @endif
                                            @if (auth::user()->pengguna->role_id == 3)
                                                <th width="80px">Pendata</th>
                                                <th width="80px">Pada</th>
                                            @endif 
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($data as $p)
                                        <tr>
                                            <td>{{$p->jenis}}</td>
                                            <td>{{$p->kebutuhan}}</td>
                                            <td>{{$p->tersedia}}</td>
                                            <td>{{$p->kerusakan}}</td>
                                            <td>
                                                @php
                                                    $total = ($p->kebutuhan - $p->tersedia) + $p->kerusakan;
                                                    // var_dump($total);
                                                @endphp
                                                <button style="width: 100px" type="button" class="btn btn-info waves-effect" data-trigger="focus" data-container="body" data-toggle="popover"
                                            data-placement="bottom" title="Pesan" data-content="Kekurangan : {{$total}}"><i class="material-icons">info</i> Informasi
                                            </button>
                                            </td>
                                            <td>
                                            @if ($p->created_at == $p->updated_at)
                                                    <button style="margin-left: 30px" title="New Data" type="button" class="btn bg-green btn-circle waves-effect waves-float"><i class="material-icons">note_add</i></button>
                                            @else
                                                    <button style="margin-left: 30px" title="Update Data" type="button" class="btn bg-blue btn-circle waves-effect waves-float"><i class="material-icons">loop</i></button>
                                            @endif    
                                               
                                            </td>
                                            @if (auth::user()->pengguna->role_id == 3)
                                                <td>{{$p->oleh}}</td>
                                                <td>{{$p->updated_at}}</td>
                                            @endif
                                            @if (Auth::user()->pengguna->role_id ==  1)
                                            	
                                            
                                            <td>
                                                
                                                
                                                  <button type="button" title="Edit" style="width: 45px;height: 35px" data-color="light-blue" class="btn bg-light-blue"  data-toggle="modal" data-target="#largeModal{{$loop->iteration}}"><i class="material-icons">create</i></button>

                                                  <div class="modal fade" id="largeModal{{$loop->iteration}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="largeModalLabel">Edit Fasilitas</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row clearfix">
                                                                    <form method="post" action="{{ route('edit_fasilitas', $p->id) }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="text" name="oleh" value="{{auth::user()->pengguna->nama}}" hidden="">  
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label>Jenis Fasilitas</label>
                                                                                <input type="text" name="jenis" required="" autocomplete="off" class="form-control" value="{{$p->jenis}}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6" style="margin-top: 10px">
                                                                        <h2 class="card-inside-title">Foto Fasilitas</h2>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <a target="_blank" href="{{ asset('images/fasilitas/'. $p->foto) }}" data-sub-html="{{$p->nama}}">
                                                                    <img class="img-responsive thumbnail" width="20%" src="{{ asset('images/fasilitas/'. $p->foto) }}">
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
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label>Kebutuhan</label>
                                                                                <input type="number" required="" class="form-control" name="kebutuhan" autocomplete="off" value="{{$p->kebutuhan}}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label>Tersedia</label>
                                                                                <input type="number" required="" name="tersedia" autocomplete="off" class="form-control" value="{{$p->tersedia}}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label>Kerusakan</label>
                                                                                <input type="number" required="" name="rusak" autocomplete="off" class="form-control" value="{{$p->kerusakan}}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success"><i class="material-icons">save</i> Simpan</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="material-icons">cancel</i> Batal</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                                </form>
                                                <button style="width: 45px;height: 35px" type="button" data-color="red" class="btn bg-red waves-effect" data-toggle="modal" data-target="#defaultModal{{$loop->iteration}}" title="Hapus"><i class="material-icons">delete</i></button>

                                                <div class="modal fade" id="defaultModal{{$loop->iteration}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <button style="float: right; width: 50px" type="button" class="btn btn-link waves-effect" data-dismiss="modal"><i class="material-icons">clear</i></button>
                                                                <h4 class="modal-title" id="defaultModalLabel">Hapus Fasilitas</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                               Anda Yakin ingin menghapus Fasilitas {{$p->jenis}} ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('hapus_fasilitas', $p->id) }}" method="post">
                                                                    @csrf
                                                                    <button class="btn btn-danger waves-effect">HAPUS</button>
                                                                    </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            @endif
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

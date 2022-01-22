@extends('admin.master')
@section('konten')
        <section class="content">
        <div class="container-fluid">
            <!-- Widgets -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <p style="font-size: 19px">DATA TEMPAT PEMUNGUTAN SUARA
                                    @if (auth::user()->pengguna->role_id == 1)
                                        <a href="{{ route('tambah_tps') }}" title="Tambah TPS" class="btn btn-success" style="float: right;"><i class="material-icons">
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
                                    <form method="post" action="{{ route('status_tps', $p->id) }}">
                                @csrf
                                    <div class="demo-radio-button">
                                        <h2 style="margin-bottom: 10px" class="card-inside-title">Status Pendataan TPS</h2>
                                        
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
                                            <th>Desa</th>
                                            <th>Alamat</th>
                                            <th>Petugas</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($tps as $p)
                                        <tr>
                                            <td>TPS {{$p->nama}}</td>
                                            <td>{{$p->desa->desa}}</td>
                                            <td>{{$p->alamat}}</td>
                                            <td>{{$p->petugas}}</td>
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
                                                 @if ($p->status == "ya" || $p->status == "tidak" || auth::user()->pengguna->role_id == 2 && auth::user()->pengguna->role_id == 3)
                                                     <button type="button" title="Info" style="width: 90px;height: 35px" data-color="light-blue" class="btn bg-light-blue"  data-toggle="modal" data-target="#largeModal{{$loop->iteration}}"><i class="material-icons">info</i></button>

                                                  <div class="modal fade" id="largeModal{{$loop->iteration}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="largeModalLabel">Detail Data TPS</h4>
                                                            </div>
                                                            <div class="modal-body">
                            
                                                                    <form>
                                                                    @csrf  
                                                                         <div class="row clearfix">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <h2 class="card-inside-title">Nama</h2>
                                                                                        <input type="text" name="nama" value="{{$p->nama}}" required="" autocomplete="off" class="form-control" readonly="" placeholder="Nama Tempat" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>  
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <h2 class="card-inside-title">Alamat</h2>
                                                                                        <input type="text" readonly="" name="alamat" value="{{$p->alamat}}" required="" autocomplete="off" class="form-control" placeholder="Alamat" />
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <h2 class="card-inside-title">Berada di Desa</h2>
                                                                                        <input type="text" readonly="" name="alamat" value="{{$p->desa->desa}}" required="" autocomplete="off" class="form-control" placeholder="Alamat" />
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                             
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <h2 class="card-inside-title">Petugas</h2>
                                                                                        <input type="number" readonly="" readonly="" min="10" name="petugas" value="{{$p->petugas}}" required="" autocomplete="off" class="form-control" placeholder="Banyak Petugas" />
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
                                                                                        <input type="number" min="3" name="pengawas" value="{{$p->pengawas}}" required="" readonly="" autocomplete="off" class="form-control" placeholder="Banyak Pengawas" />
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
                                                                                        <input readonly="" type="number" name="luas" required="" value="{{$p->luas}}" autocomplete="" class="form-control" placeholder="Luas Lahan">
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    {{-- <div class="form-line"> --}}
                                                                                        <h2 class="card-inside-title">Link Lokasi</h2>
                                                                                        <a href="{{$p->link}}" target="_blank" class="btn btn-block btn-info" type="button" style="text-decoration: none; margin-top: 13px"><i class="material-icons">place</i> Lihat Lokasi</a>
                                                                                       {{--  <input type="url" name="link" value="{{$data->link}}" required="" autocomplete="off" class="form-control" placeholder="Link Lokasi"> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                        
                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <div class="form-line">
                                                                                            <h2 class="card-inside-title">Ketua TPS</h2>
                                                                                            <input type="text" readonly="" name="ketua" value="{{$p->ketua}}" required="" autocomplete="off" class="form-control" placeholder="Ketua Penanggung Jawab" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6" style="margin-top: 10px">
                                                                                    <h2 class="card-inside-title">Foto Tempat Pemungutan Suara</h2>
                                                                                    <div class="form-group">
                                                                                        <a target="_blank" href="{{ asset('images/tps/'. $p->foto) }}" data-sub-html="{{$p->nama}}">
                                                                                <img class="img-responsive thumbnail" width="40%" src="{{ asset('images/tps/'. $p->foto) }}">
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
                                                                                            <input type="text" readonly="" name="ketua" value="{{$p->oleh}}" required="" autocomplete="off" class="form-control" placeholder="Ketua Penanggung Jawab" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="material-icons">cancel</i> Tutup</button>
                                                            </div>
                                                            </form>
                                                     @elseif(auth::user()->pengguna->role_id == 3 && $p->status == Null)
                                                      <a href="{{ route('verif_tps', $p->id) }}" title="Verifikasi TPS" style="width: 90px;height: 35px" type="button" class="btn bg-blue waves-effect waves-float"><i class="material-icons">verified_user</i></a>
                                                     @else
                                                     @php
                                                         $parameter = [
                                                            'id' => $p->id,
                                                         ];
                                                         $id = Crypt::encrypt($parameter);
                                                         // echo $id;
                                                     @endphp
                                                     <a href="{{ route('edit_tps', $id) }}" title="Edit TPS" class="btn btn-primary" ><i class="material-icons">create</i></a>
                                                 
                                                     <button style="width: 45px;height: 35px" type="button" data-color="red" class="btn bg-red waves-effect" data-toggle="modal" data-target="#defaultModal{{$loop->iteration}}" title="Hapus"><i class="material-icons">delete</i></button>

                                                <div class="modal fade" id="defaultModal{{$loop->iteration}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button style="float: right;" type="button" class="btn btn-link waves-effect" data-dismiss="modal"><i class="material-icons">clear</i></button>
                                                                <h4 class="modal-title" id="defaultModalLabel">Hapus Tempat Pemungutan Suara</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                               Anda Yakin ingin menghapus TPS {{$p->nama}} ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('hapus_tps', $p->id) }}" method="post">
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
        @foreach ($tps as $p)
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

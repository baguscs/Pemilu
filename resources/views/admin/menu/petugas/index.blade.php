@extends('admin.master')
@section('konten')
        <section class="content">
        <div class="container-fluid">
            <!-- Widgets -->

                       <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <p style="font-size: 19px">DATA PEGAWAI PEMILU
                                        {{-- <a href="{{ route('tambah_pegawai') }}" title="Tambah Pegawai" class="btn btn-success" style="float: right;"><i class="material-icons">
                            add</i></a> --}}
                            <button style="float: right;" title="Tambah Pegawai" type="button" class="btn btn-success waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal"><i class="material-icons">add</i></button>

                            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="defaultModalLabel">Tambah Pegawai</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <a style="text-decoration: none;" title="Admin" href="{{ route('tambah_admin') }}" class="thumbnail">
                                                    <p style="text-align: center; font-weight: bold; color: black; font-size: 30px;">ADMIN</p>
                                                   <img src="{{ asset('images/admin.png') }}">
                                                </a>
                                            </div>
                                            <div class="col-xs-12 col-md-6">
                                                <a title="Petugas" style="text-decoration: none;" href="{{ route('tambah_pegawai') }}" class="thumbnail">
                                                    <p style="text-align: center; font-weight: bold; color: black; font-size: 30px;">PETUGAS</p>
                                                    <img width="83.5%" src="{{ asset('images/user.png') }}">
                                                </a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            </p>
                             @if ($messege = Session::get("pesan"))
                             <div style="margin-top: 15px" class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ Session::get("pesan") }}
                            </div>
                             @endif
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th width="100px">NIP</th>
                                            <th width="80px">Asal</th>
                                            <th width="50px">Akses</th>
                                            <th width="50px">Password</th>
                                            <th width="80px">Status</th>
                                            <th width="80px">Opsi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($data as $p)
                                        <tr>
                                            <td>{{$p->nama}}</td>
                                            <td>{{$p->no_ket}}</td>
                                            @if ($p->role_id == 2)
                                                <td>Kelurahan {{$p->asal}}</td>
                                            @else
                                                <td>{{$p->asal}}</td>
                                            @endif
                                            
                                            <td>{{$p->role->role}}</td>
                                            @if ($p->akses == "Diubah")
                                                <td><center><i title="{{$p->akses}}" class="material-icons">check_box</i></center></td>
                                            @else
                                             <td>{{$p->akses}}</td>
                                            @endif
                                           
                                            <td>
                                                    
                                                @if($p->status == "ya")
                                                    <button type="button" class="btn btn-success waves-effect" data-trigger="focus" data-container="body" data-toggle="popover"
                                                    data-placement="bottom" title="Pesan" data-content="{{$p->pesan}}"><i class="material-icons">done</i> Bertugas</button>
                                                @else
                                                    <button type="button" class="btn btn-danger waves-effect" data-trigger="focus" data-container="body" data-toggle="popover"
                                                    data-placement="bottom" title="Pesan" data-content="{{$p->pesan}}"><i class="material-icons">cancel</i> Diblokir</button>
                                                @endif
                                            </td>

                                            <td>
                                                @php
                                                    $parameter = [
                                                            'id' => $p->id,
                                                         ];
                                                         $id = Crypt::encrypt($parameter);
                                                @endphp
                                                <a href="{{ route('edit_pegawai', $id) }}" title="Edit Pegawai" class="btn btn-info" ><i class="material-icons">create</i></a>

                                                     <button style="width: 45px;height: 35px" type="button" data-color="red" class="btn bg-red waves-effect" data-toggle="modal" data-target="#defaultModal{{$loop->iteration}}" title="Hapus"><i class="material-icons">delete</i></button>

                                                <div class="modal fade" id="defaultModal{{$loop->iteration}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button style="float: right;" type="button" class="btn btn-link waves-effect" data-dismiss="modal"><i class="material-icons">clear</i></button>
                                                                <h4 class="modal-title" id="defaultModalLabel">Hapus Hak Pemilih</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                               Anda Yakin ingin menghapus Pegawai {{$p->nama}} ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('hapus_pegawai', $p->id) }}" method="post">
                                                                    @csrf
                                                                    <button class="btn btn-danger waves-effect">
                                                                        HAPUS
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                     
                                                 
                                        
                                                        </form>
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
             document.getElementById('ttg').value='{{$p->ttg}}';
        @endforeach
       
    </script>
    <script>
        $("#desa").select2({
            allowClear: true
        });
    </script>
@endpush

@extends('admin.master')

@push("css")
    <link rel="icon" href="{{ asset('images/pemilu.ico') }}">

@endpush
@section('konten')
        <section class="content">
        <div class="container-fluid">
        
                       <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <p style="font-size: 19px;">JADWAL ACARA PEMILU 2020

                            <button style="float: right;" type="button" title="Tambah Jadwal" class="btn btn-success waves-effect m-r-20" data-toggle="modal" data-target="#largeModal"> <i class="material-icons">
                            add</i></button>

                             <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="largeModalLabel">Tambah Jadwal Acara</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form action="{{ route('add_jadwal') }}" method="post">
                                               @csrf
                                               <div class="row clearfix">
                                                   <div class="col-sm-12">
                                                       <div class="form-group">
                                                           <div class="form-line">
                                                            <h5 class="card-inside-title">Judul Acara</h5>
                                                               <input type="text" autocomplete="off" name="judul" class="form-control" required="" placeholder="Judul Acara">
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-sm-12">
                                                           <div class="form-group">
                                                               <div class="form-line">
                                                                   <h5 class="card-inside-title">Tempat Acara</h5>
                                                                   <input type="text" autocomplete="off" name="tempat" class="form-control" required="" placeholder="Tempat Acara">
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="row clearfix">
                                                      <div class="col-sm-12">
                                                        <h5 class="card-inside-title">Waktu Acara</h5>
                                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                            <div class="form-line">
                                                                <input type="text" autocomplete="off" name="tglm" required="" class="form-control" placeholder="Tanggal Mulai">
                                                            </div>
                                                            <span class="input-group-addon">Sampai</span>
                                                            <div class="form-line">
                                                                <input type="text" autocomplete="off" name="tgls" required="" class="form-control" placeholder="Tanggal Berakhir">
                                                            </div>
                                                        </div>
                                                    </div>
                                                   </div>
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success btn-lg waves-effect"><i class="material-icons">save</i> Simpan</button>
                                            <button type="button" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal"><i class="material-icons">cancel</i> Tutup</button>
                                        </div>
                                        </form>
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
                                            <th>Judul</th>
                                            <th>Tempat</th>
                                            <th>Tanggal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($data as $p)
                                        <tr>
                                            <td>{{$p->judul}}</td>
                                            <td>{{$p->tmp}}</td>
                                            <td>{{$p->tglm}} - {{$p->tgls}}</td>
                                            <td>
                                                @php
                                                  $parameter = [
                                                    'id' => $p->id,
                                                  ];
                                                  $id = Crypt::encrypt($parameter);
                                                @endphp
                                                <a href="{{ route('edit_jadwal', $id) }}" class=" btn bg-blue waves-effect" type="button" title="Edit Jadwal"><i class="material-icons">create</i></a>
                                                
                                                <button style="width: 45px;height: 35px" type="button" data-color="red" class="btn bg-red waves-effect" data-toggle="modal" data-target="#defaultModal{{$loop->iteration}}" title="Hapus"><i class="material-icons">delete</i></button>

                                                <div class="modal fade" id="defaultModal{{$loop->iteration}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                              <button style="float: right;" type="button" class="btn btn-link waves-effect" data-dismiss="modal"><i class="material-icons">clear</i></button>
                                                                <h4 class="modal-title" id="defaultModalLabel">Hapus Fasilitas</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                               Anda Yakin ingin menghapus Jadwal {{$p->judul}} ?
                                                            </div>
                                                            <div class="modal-footer">
                                                              <form action="{{ route('hapus_jadwal', $p->id) }}" method="post">
                                                                @csrf
                                                                <button class="btn btn-danger waves-effect">
                                                                  HAPUS
                                                                </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- @endif --}}
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

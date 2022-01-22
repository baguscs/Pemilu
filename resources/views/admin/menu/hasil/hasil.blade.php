@extends('admin.master')
@section('konten')
        <section class="content">
        <div class="container-fluid">
            <!-- Widgets -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Hasil Suara {{$calon->nama}}
                            </h2>
                        </div>
                        <div class="body">
                            <center>
                            <figure class="figure">
                              <img src="{{ asset('images/paslon/'. $calon->foto) }}" width="35%" class="figure-img img-fluid rounded" alt="...">
                            </figure>
                            </center>
                                 <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <h5 class="card-inside-title">Nama</h5>
                                                <input type="text" value="{{$calon->nama}}" autocomplete="off" name="judul" class="form-control" required="" placeholder="Judul Acara" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <h5 class="card-inside-title">NIP</h5>
                                                <input type="text" value="{{$calon->nip}}" autocomplete="off" name="tempat" class="form-control" required="" placeholder="Tempat Acara" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <h5 class="card-inside-title">Hasil Suara</h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-pink progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 40%">
                                                PINK PROGRESS BAR
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </section>

@endsection
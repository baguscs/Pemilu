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
                          @foreach ($data as $rules)
                            <form action="{{ route('ganti_jadwal', $rules->id) }}" method="post">
                            @csrf
                              <div class="row clearfix">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <div class="form-line">
                                      <h5 class="card-inside-title">Judul Acara</h5>
                                        <input type="text" value="{{$rules->judul}}" autocomplete="off" name="judul" class="form-control" required="" placeholder="Judul Acara">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <div class="form-line">
                                      <h5 class="card-inside-title">Tempat Acara</h5>
                                        <input type="text" value="{{$rules->tmp}}" autocomplete="off" name="tempat" class="form-control" required="" placeholder="Tempat Acara">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row clearfix">
                                <div class="col-sm-12">
                                  <h5 class="card-inside-title">Waktu Acara</h5>
                                    <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                      <div class="form-line">
                                        <input type="text" value="{{$rules->tglm}}" autocomplete="off" name="tglm" required="" class="form-control" placeholder="Tanggal Mulai">
                                      </div>
                                        <span class="input-group-addon">Sampai</span>
                                      <div class="form-line">
                                        <input type="text" value="{{$rules->tgls}}" autocomplete="off" name="tgls" required="" class="form-control" placeholder="Tanggal Berakhir">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="basic_checkbox_2" class="filled-in" required="" />
                                        <label for="basic_checkbox_2">Saya telah memahami dan memeriksa tentang kebenaran data diatas, serta saya akan bertanggung jawab jika ada kesalahan.</label>
                                    </div>
                                </div>
                                </div>
                                <div class="row clearfix">
                                  <div class="col-sm-6">
                                    <button type="submit" title="Simpan" class="btn btn-block btn-success waves-effect"><i class="material-icons">save</i> Simpan</button>      
                                  </div>
                                  <div class="col-sm-6"><a href="{{ route('jadwal') }}" class="btn btn-block btn-danger waves-effect" type="button" title="Batal"><i class="material-icons">clear</i> Batal</a>
                                  </div>
                                </div>
                              </form> 
                          @endforeach
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection

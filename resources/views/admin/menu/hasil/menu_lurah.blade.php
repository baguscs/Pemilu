@extends('admin.master')
@section('konten')
<style>
	.choose{
		margin-top: 10px;
	}
</style>
	<section class="content">
		<div class="container-fuild">
			<div class="row clearfix">
				@foreach ($data as $row)
		        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		            <div class="card">
		                <div class="header">
		                    <h2>
		                        Kelurahan {{$row->nama}}
		                    </h2>
		                </div>
		                <div class="body">
		                    Silahkan Klik Tombol Dibawah Ini Untuk Melihat Hasil Pemilu Kelurahan {{$row->nama}}
		                    @php
                              $parameter = [
                              	'id' => $row->id,
                              ];
                              $id = Crypt::encrypt($parameter);
                            @endphp
		                    <p class="choose"><a href="{{ route('detail_lurah', $id) }}" type="" class="btn btn-primary waves-effect waves-float">Lihat Hasil</a></p>
		                </div>
		            </div>
		        </div>
				@endforeach
		    </div>
		</div>
	</section>
@endsection
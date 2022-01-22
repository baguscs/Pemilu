
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Pemilu Online</title>
<link href="{{ asset('css/styles.css') }}" media="all" rel="stylesheet" type="text/css" />
</head>

<body itemscope itemtype="http://schema.org/EmailMessage">

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="content-wrap aligncenter">
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td class="content-block">
										<h1 class="aligncenter">Konfirmasi Hak Pilih Pemilu Online {{$tahun}}</h1>
									</td>
								</tr>
								<tr>
									<td class="content-block">
										<h2 class="aligncenter">Hi, {{$nama}}</h2>
									</td>
								</tr>
								<tr>
									<td class="content-block">{{$pesan}}</td>
								</tr>
								<tr>
									<td class="content-block aligncenter">
										<table class="invoice">
											<tr>
												<td>Data Pemilik Suara :</td>
											</tr>
											<tr>
												<td>
													<table class="invoice-items" cellpadding="10" cellspacing="5">
														<tr>
															<td>Nama</td>
															<td>:</td>
															<td class="aligncenter">{{$nama}}</td>
														</tr>
														<tr>
															<td>NIK</td>
															<td>:</td>
															<td class="aligncenter">{{$nik}}</td>
														</tr>
														<tr>
															<td>Asal Desa</td>
															<td>:</td>
															<td class="aligncenter">{{$desa}}</td>
														</tr>
														<tr>
															<td>Tanggal Lahir</td>
															<td>:</td>
															<td class="aligncenter">{{$ttg}}</td>
														</tr>
														<tr>
															<td>Kode Akses</td>
															<td>:</td>
															<td class="aligncenter">{{$pass}}</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<br>
								<tr>
									<td class="">
										Mohon untuk dirahasiakan password ini, agar hak pilih anda dapat terdata oleh kami. Terima Kasih
									</td>
								</tr>
								<tr>
									<td class="">
										Hormat Kami, Komisi Pemilihan Umum Daerah Surabaya
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</div>
		</td>
		<td></td>
	</tr>
</table>

</body>
</html>

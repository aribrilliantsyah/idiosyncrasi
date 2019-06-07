Laporan Zakat infaq dan sodaqoh Bulan {{ date('F') }} Tahun {{ date('Y') }}. <br>

<p>
	Dana Yang di dapat dari donatur diantara lain :
	<br>
	@foreach($laporan->count->ket as $key =>$value)
		{{ $key }} : {{ $value }} ,
	@endforeach
	<br>
	Dana Teralokasikan kepada para penerima bantuan :
	<br>
	@foreach($laporan->ket as $key =>$value)
		{{ $key }} : {{ $value }} Orang,
	@endforeach
</p>
Laporan Zakat Mal Bulan {{ date('F') }} Tahun {{ date('Y') }}. <br>

<p>
	Dana Yang di dapat dari muzzaki diantara lain :
	<br>
	@foreach($laporan->count->ket as $key =>$value)
		{{ $key }} : {{ $value }} ,
	@endforeach
	<br>
	Dana Teralokasikan kepada para mustahik :
	<br>
	@foreach($laporan->ket as $key =>$value)
		{{ $key }} : {{ $value }} Orang,
	@endforeach
</p>
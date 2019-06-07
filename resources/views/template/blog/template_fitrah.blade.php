Laporan Zakat Fitrah Bulan {{ date('F') }} Tahun {{ date('Y') }}. <br>

<p>
	Dana Yang diperoleh dari para Muzzaki :
	<table class="table table-bordered" border="1">
		@foreach($laporan->count->ket as $key =>$value)
		<tr>
			<td>Zakat {{ $key }} : </td>
			<td>
				@foreach($value as $k => $v)
					{{ $k }} : {{ $v }} , 
				@endforeach
			</td>
		</tr>
		@endforeach
	</table>
	Dana Teralokasikan kepada para mustahik :
	<table class="table table-bordered" border="1">
		<tr>
			<td>Mustahik</td>
			<td>Jumlah</td>
		</tr>
		<tr>
			@foreach($laporan->ket as $key =>$value)
			<td>{{ $key }}</td>
			<td>{{ $value }}</td>
			@endforeach
		</tr>
	</table>
</p>
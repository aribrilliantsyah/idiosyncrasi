Laporan Zakat Mal Bulan {{ date('F') }} Tahun {{ date('Y') }}. <br>

<p>
	Dana Yang diperoleh dari para Muzzaki :
	<table border="1">
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
	Dana Teralokasikan kepada para mustahik dan juga kepada lembaga/yayasan:
	<table>
		@foreach($laporan->ket as $key =>$value)
		<tr>
			<td>{{ $key }}</td>
			<td>
				@foreach($value as $k => $v)
					{{ $k }} : {{ $v }} ,<br>
				@endforeach
			</td>
		</tr>
		@endforeach
	</table>
</p>
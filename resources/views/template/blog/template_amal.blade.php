Laporan Infaq Dan Sodaqoh {{ date('F') }} Tahun {{ date('Y') }}. <br>

<p>
	Dana Yang diperoleh dari para Donatur :
	<table class="table table-bordered" border="1">
		@foreach($laporan->count->ket as $key =>$value)
		<tr>
			<td>{{ $key }} : </td>
			<td>
				@foreach($value as $k => $v)
					{{ $k }} : {{ $v }} , 
				@endforeach
			</td>
		</tr>
		@endforeach
	</table>
	Dana Teralokasikan kepada Orang yang membutuhkan dan juga kepada lembaga/yayasan:
	<table class="table table-bordered">
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
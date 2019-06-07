
<h3>Export Perolehan Infaq Dan Sodaqoh {{ isset($awal) ? 'Tgl. '.$awal : '' }}  {{ isset($akhir) ? 's/d '.$akhir : '' }}</h3>
<table border="1" class="tg">
<tr>
	<th>No</th>
	<th>Kode</th>
	<th>Jenis</th>
	<th>Status</th>
	<th>Tanggal</th>
</tr>
@php
	$no=1;
@endphp
 @foreach($data as $d)
<tr>
	<td>{{ $no++ }}</td>
	<td>{{ $d->kode }}</td>
	<td>{{ $d->jenis }}</td>
	<td>
		@if($d->status == "unverified")
		Belum Terbagikaan 
		@else 
		Terbagikan 
		@endif
    </td>
	<td>{{ date_format($d->created_at,'d-m-Y') }}</td>
	@foreach($d->ket as $key =>$value)
	<tr>
		<td colspan="3">{{ $key }} : </td>
		<td colspan="2">
			@foreach($value as $k => $v)
				{{ $k }} : {{ $v }} , 
			@endforeach
		</td>
	</tr>
	@endforeach
</tr>
 @endforeach
</table>
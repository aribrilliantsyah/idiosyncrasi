<h3>Export Data In Out {{ isset($start) ? 'Tgl. '.$start : '' }} {{ isset($end) ? 's/d '.$end : '' }}</h3>
<table border="1" class="tg">
<tr>
	<th>No</th>
	<th>Jenis</th>
	<th>Jumlah</th>
	<th>Keterangan</th>
	<th>Tanggal</th>
</tr>
@php
	$no=1;
@endphp
@foreach($data as $d)
<tr>
	<td>{{ $no++ }}</td>
	<td>{{ $d->jenis }}</td>
	<td>{{ $d->jumlah }}</td>
	<td>{{ $d->keterangan }}</td>
	<td>{{ date_format($d->created_at,'d-m-Y') }}</td>
</tr>
 @endforeach
</table>
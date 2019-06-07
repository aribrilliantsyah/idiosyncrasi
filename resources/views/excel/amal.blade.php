
<h3>Export Infaq & Sodaqoh  {{ isset($awal) ? 'Tgl. '.$awal : '' }}  {{ isset($akhir) ? 's/d '.$akhir : '' }}</h3>
<table border="1" class="tg">
<tr>
	<th>No</th>
	<th>Nama</th>
	<th>Jenis Kelamin</th>
	<th>Alamat</th>
	<th>Jenis Zakat</th>
	<th>Nominal/Jumlah</th>
	<th>Tanggal</th>
</tr>
@php
	$no=1;
@endphp
 @foreach($data as $d)
<tr>
	<td>{{ $no++ }}</td>
	<td>{{ $d->nama }}</td>
	<td>{{ $d->jk }}</td>
	<td>{{ $d->alamat }}</td>
	<td>{{ $d->jenis }}</td>
	<td>{{ 'Rp.'.number_format($d->nominal,2,',','.')}}
    </td>
	<td>{{ date_format($d->created_at,'d-m-Y') }}</td>
</tr>
 @endforeach
</table>
<style type="text/css">
	.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
	.tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
	.tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
	.tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
	.tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
	.tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
</style>
<h3>Export Alokasi Zakat Fitrah {{ isset($awal) ? 'Tgl. '.$awal : '' }}  {{ isset($akhir) ? 's/d '.$akhir : '' }}</h3>
<table border="1" class="tg">
<tr>
	<th class="th-3wr7">No</th>
	<th class="th-3wr7">Kode</th>
	<th class="th-3wr7">Jenis</th>
	<th class="th-3wr7">Status</th>
	<th class="th-3wr7">Tanggal</th>
</tr>
@php
	$no=1;
@endphp
 @foreach($data as $d)
<tr>
	<td class="tg-rv4w">{{ $no++ }}</td>
	<td class="tg-rv4w">{{ $d->kode }}</td>
	<td class="tg-rv4w">{{ $d->jenis }}</td>
	<td class="tg-rv4w">
		@if($d->status == "unverified")
		Belum Terbagikaan 
		@else 
		Terbagikan 
		@endif
    </td>
	<td class="tg-rv4w">{{ date_format($d->created_at,'d-m-Y') }}</td>
</tr>
<tr>
	<td colspan="5">Perolehan</td>
</tr>
@foreach($d->count->ket as $key =>$value)
<tr>
	<td colspan="3" class="tg-rv4w">Zakat {{ $key }} : </td>
	<td colspan="2" class="tg-rv4w">
		@foreach($value as $k => $v)
			{{ $k }} : {{ $v }} ,
		@endforeach
	</td>
</tr>
@endforeach
<tr>
	<td colspan="5">Pembagian</td>
</tr>
<tr>
	<td class="tg-rv4w" colspan="3">Mustahik</td>
	<td class="tg-rv4w" colspan="2">Jumlah</td>
</tr>
<tr>
	@foreach($d->ket as $key =>$value)
	<td class="tg-rv4w" colspan="3">{{ $key }}</td>
	<td class="tg-rv4w" colspan="2">{{ $value }}</td>
	@endforeach
</tr>
@endforeach
</table>
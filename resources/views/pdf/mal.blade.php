<style type="text/css">
	.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
	.tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
	.tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
	.tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
	.tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
	.tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
</style>
<h3>Export Zakat Mal {{ isset($awal) ? 'Tgl. '.$awal : '' }}  {{ isset($akhir) ? 's/d '.$akhir : '' }}</h3>
<table border="1" class="tg">
<tr>
	<th class="th-3wr7">No</th>
	<th class="th-3wr7">Nama</th>
	<th class="th-3wr7">Jenis Kelamin</th>
	<th class="th-3wr7">Alamat</th>
	<th class="th-3wr7">Jenis Zakat</th>
	<th class="th-3wr7">Nominal/Jumlah</th>
	<th class="th-3wr7">Tanggal</th>
</tr>
@php
	$no=1;
@endphp
@foreach($data as $d)
<tr>
	<td class="tg-rv4w">{{ $no++ }}</td>
	<td class="tg-rv4w">{{ $d->nama }}</td>
	<td class="tg-rv4w">{{ $d->jk }}</td>
	<td class="tg-rv4w">{{ $d->alamat }}</td>
	<td class="tg-rv4w">{{ $d->jenis }}</td>
	<td class="tg-rv4w">@php
			if($d->bentuk == "rupiah"){
                echo 'Rp.'.number_format($d->nominal,2,',','.');
            }elseif ($d->bentuk == "gram") {
                echo $d->nominal." .gr";
            }elseif ($d->bentuk == "kilogram") {
                echo $d->nominal." .Kg";
            }else{

            } @endphp
    </td>
	<td class="tg-rv4w">{{ date_format($d->created_at,'d-m-Y') }}</td>
</tr>
 @endforeach
</table>
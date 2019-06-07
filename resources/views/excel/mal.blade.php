<h3>Export Zakat Mal {{ isset($awal) ? 'Tgl. '.$awal : '' }}  {{ isset($akhir) ? 's/d '.$akhir : '' }}</h3>
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
	<td>@php
			if($d->bentuk == "rupiah"){
                echo 'Rp.'.number_format($d->nominal,2,',','.');
            }elseif ($d->bentuk == "gram") {
                echo $d->nominal." .gr";
            }elseif ($d->bentuk == "kilogram") {
                echo $d->nominal." .Kg";
            }else{

            } @endphp
    </td>
	<td>{{ date_format($d->created_at,'d-m-Y') }}</td>
</tr>
 @endforeach
</table>
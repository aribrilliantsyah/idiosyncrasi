<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\inout;
use App\fitrah;
use App\mal;
use App\amal;
use App\count;
use App\share;
use Session;

class Excelcontroller extends Controller
{
    //
    public function date($jenis,Request $request)
    {
    	if($request->start != null && $request->end != null){
    		if($jenis == 'inout'){
	    		$start = $request->start;
	    		$end = $request->end;
	    		$judul = 'in-out data'.$start.'to'.$end;
	    		$data = inout::whereBetween('created_at',[$this->convert($start),$this->convert($end)])->get();
	    		return $this->export($jenis,$judul,$start,$end,$data);
	    	}else if($jenis == 'fitrah'){
	    		$start = $request->start;
	    		$end = $request->end;
	    		$judul = 'Export Zakat Fitrah'.$start.'to'.$end;
	    		$data = fitrah::whereBetween('created_at',[$this->convert($start),$this->convert($end)])->get();
	    		return $this->export($jenis,$judul,$start,$end,$data);
	    	}elseif ($jenis == 'mal') {
	    		$start = $request->start;
	    		$end = $request->end;
	    		$judul = 'Export Zakat Mal'.$start.'to'.$end;
	    		$data = mal::whereBetween('created_at',[$this->convert($start),$this->convert($end)])->get();
	    		return $this->export($jenis,$judul,$start,$end,$data);
	    	}elseif ($jenis == 'amal') {
	    		$start = $request->start;
	    		$end = $request->end;
	    		$judul = 'Export Infaq Sodaqoh'.$start.'to'.$end;
	    		$data = amal::whereBetween('created_at',[$this->convert($start),$this->convert($end)])->get();
	    		return $this->export($jenis,$judul,$start,$end,$data);
	    	}elseif ($jenis == 'cfitrah') {
	    		$start = $request->start;
	    		$end = $request->end;
	    		$judul = 'Export Perolehaan Zakat Fitrah'.$start.'to'.$end;
	    		$data = $this->count('fitrah')->whereBetween('created_at',[$this->convert($start),$this->convert($end)])->get();
	    		return $this->export($jenis,$judul,$start,$end,$data);
	    	}elseif ($jenis == 'cmal') {
	    		$start = $request->start;
	    		$end = $request->end;
	    		$judul = 'Export Perolehaan Zakat Mal'.$start.'to'.$end;
	    		$data = $this->count('mal')->whereBetween('created_at',[$this->convert($start),$this->convert($end)])->get();
	    		return $this->export($jenis,$judul,$start,$end,$data);
	    	}elseif ($jenis == 'camal') {
	    		$start = $request->start;
	    		$end = $request->end;
	    		$judul = 'Export Perolehaan Infaq Sodaqoh'.$start.'to'.$end;
	    		$data = $this->count('amal')->whereBetween('created_at',[$this->convert($start),$this->convert($end)])->get();
	    		return $this->export($jenis,$judul,$start,$end,$data);
	    	}elseif ($jenis == 'alfitrah') {
	    		$start = $request->start;
	    		$end = $request->end;
	    		$judul = 'Export Alokasi fitrah'.$start.'to'.$end;
	    		$data = $this->share('fitrah')->whereBetween('created_at',[$this->convert($start),$this->convert($end)])->get();
	    		return $this->export($jenis,$judul,$start,$end,$data);
	    	}elseif ($jenis == 'almal') {
	    		$start = $request->start;
	    		$end = $request->end;
	    		$judul = 'Export Alokasi Mal'.$start.'to'.$end;
	    		$data = $this->share('mal')->whereBetween('created_at',[$this->convert($start),$this->convert($end)])->get();
	    		return $this->export($jenis,$judul,$start,$end,$data);
	    	}elseif ($jenis == 'alamal') {
	    		$start = $request->start;
	    		$end = $request->end;
	    		$judul = 'Export Alokasi Infaq Sodaqoh'.$start.'to'.$end;
	    		$data = $this->share('amal')->whereBetween('created_at',[$this->convert($start),$this->convert($end)])->get();
	    		return $this->export($jenis,$judul,$start,$end,$data);
	    	}else{
	    		return redirect()->back();
	    	}
    	}else{
			Session::flash("notif",[
			   "level"=>"error",
			   "title"=>"Gagal",
			   "message"=>"Tanggal Harus dipilih terlebih dahulu"
			]);
		 	return redirect()->back();
		}

    }

    public function count($jenis)
    {
    	$data = count::where('jenis',$jenis);
    	return $data;
    }
    public function share($jenis)
    {
    	$data = share::where('jenis',$jenis);
    	return $data;
    }
    public function all($jenis)
    {
		if($jenis == 'inout'){
    		$judul = 'in out data';
    		$data  = inout::all(); 
    		return $this->exportall($judul,$jenis,$data);
    	}else if($jenis == 'fitrah'){
    		$judul = 'Export Zakat Fitrah';
    		$data  = fitrah::all(); 
    		return $this->exportall($judul,$jenis,$data);
    	}elseif ($jenis == 'mal') {
    		$judul = 'Export Zakat Mal';
    		$data  = mal::all(); 
    		return $this->exportall($judul,$jenis,$data);
    	}elseif ($jenis == 'amal') {
    		$judul = 'Export Infaq Sodaqoh';
    		$data  = amal::all(); 
    		return $this->exportall($judul,$jenis,$data);
    	}elseif ($jenis == 'cfitrah') {
    		$judul = 'Export Perolehan Zakat Fitrah';
    		$data  = $this->count('fitrah')->get(); 
    		return $this->exportall($judul,$jenis,$data);
    	}elseif ($jenis == 'cmal') {
    		$judul = 'Export Perolehan Zakat Mal';
    		$data  = $this->count('mal')->get(); 
    		return $this->exportall($judul,$jenis,$data);
    	}elseif ($jenis == 'camal') {
    		$judul = 'Export Perolehan Infaq Sodaqoh';
    		$data  = $this->count('amal')->get(); 
    		return $this->exportall($judul,$jenis,$data);
    	}elseif ($jenis == 'alfitrah') {
    		$judul = 'Export Alokasi Fitrah';
    		$data  = $this->share('fitrah')->get(); 
    		return $this->exportall($judul,$jenis,$data);
    	}elseif ($jenis == 'almal') {
    		$judul = 'Export Alokasi Mal';
    		$data  = $this->share('mal')->get(); 
    		return $this->exportall($judul,$jenis,$data);
    	}elseif ($jenis == 'alamal') {
    		$judul = 'Export Alokasi Infaq Sodaqoh';
    		$data  = $this->share('amal')->get(); 
    		return $this->exportall($judul,$jenis,$data);
    	}else{
    		return redirect()->back();
    	}
    }

    public function exportall($judul,$jenis,$data)
    {

    	Excel::create($judul, function($excel) use ($data,$judul,$jenis) {
		    $excel->sheet($judul, function($sheet) use ($data,$jenis) {
		        $sheet->loadView('excel.'.$jenis,compact('data'));
		    });
		})->export('xlsx');

    }

    public function export($jenis,$judul,$start,$end,$data)
    {
    	Excel::create($judul, function($excel) use ($data,$judul,$jenis,$start,$end) {
            $excel->sheet('export', function($sheet) use ($data,$jenis,$start,$end) {
                $sheet->loadView('excel.'.$jenis,compact('data','start','end'));
            });
        })->export('xlsx');

    }
    public function convert($value)
    {
        $d = explode('/', $value);
        $date = $d[2]."-".$d[0]."-".$d[1];
        return $date;
    }
}
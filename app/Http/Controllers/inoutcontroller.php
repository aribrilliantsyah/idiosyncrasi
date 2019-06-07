<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Excel;
use Session;

use App\inout;
class inoutcontroller extends Controller
{
    public function apihistory(Request $request)
    {
        $model = inout::select('jenis','jumlah','keterangan','updated_at');

        return Datatables::of($model)
        ->addColumn('tanggal', function($model){
            return date('d/m/Y',strtotime($model->updated_at));
        })
        ->make(true);
    }
    public function exportall()
    {

    	$data = inout::all();

    	Excel::create('Export In-Out ISLAMIC' .date('Y-m-d H:S'), function($excel) use ($data) {

		    $excel->sheet('Export IN-OUT', function($sheet) use ($data) {

		        $sheet->loadView('print.excel.inout',compact('data'));

		    });

		})->export('xlsx');
    }

    public function export(Request $request)
    {
        if($request->start != null && $request->end != null){
            $data = inout::whereBetween('created_at',[$this->convert($request->start),$this->convert($request->end)])->get();

            Excel::create('Export In-Out ISLAMIC '.$request->start.' s/d '.$request->end, function($excel) use ($data) {

                $excel->sheet('Export IN-OUT', function($sheet) use ($data) {

                    $sheet->loadView('print.excel.inout',compact('data'));

                });

            })->export('xlsx');
        }else{
             Session::flash("notif",[
                "level"=>"error",
                "title"=>"Gagal",
                "message"=>"Tanggal Harus dipilih terlebih dahulu"
            ]);
             return redirect()->back();
        }
        
    }
    public function convert($value)
    {
        $d = explode('/', $value);
        $date = $d[2]."-".$d[0]."-".$d[1];
        return $date;
    }
}

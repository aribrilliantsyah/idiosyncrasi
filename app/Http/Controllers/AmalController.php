<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Excel;
use Session;

use App\amal;

class amalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('interface.backend.pendataan.amal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $amal = new amal;
        $amal->nama = $request->nama;
        $amal->jk = $request->jk;
        $amal->alamat = $request->alamat;
        $amal->nominal = $this->int($request->nominal);
        $amal->jenis = $request->jenis;
        $amal->status = date('Ym');
        $amal->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $amal = amal::find($id);
        return $amal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $amal = amal::find($request->id);
        $amal->nama = $request->nama;
        $amal->jk = $request->jk;
        $amal->alamat = $request->alamat;
        $amal->nominal = $this->int($request->nominal);
        $amal->jenis = $request->jenis;
        $amal->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function apiAmal(Request $request)
    {
        $amal = amal::where('status',date('Ym'));

        return Datatables::of($amal)
        ->filter(function ($query) use ($request,$amal)  {
            if ($request->has('jenis')) {
                if($request->jenis != 'all') {
                    $query->where('jenis', '=', $request->jenis);
                }
            }
        })
        ->addColumn('check', function($amal){
            return '<input type="checkbox" class="checkitem" name="delsel[]" value="'.$amal->id.'">';
        })
        ->addColumn('action', function($amal){
            return '<button onclick="editForm('.$amal->id.')" class="btn btn-xs btn-outline-accent m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x m-btn--pill m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="Ubah Data"><i class="la la-edit"></i></button>';
        })
        ->addColumn('tanggal', function($amal){
            return date('d/m/Y',strtotime($amal->updated_at));
        })
        ->addColumn('nominal', function($mal){
            return 'Rp.'.number_format($mal->nominal,2,',','.');
        })
        ->rawColumns(['check','action'])
        ->make(true);
    }
    public function apiHistory()
    {
        $amal = amal::all();

        return Datatables::of($amal)
        ->addColumn('tanggal', function($amal){
            return date('d/m/Y',strtotime($amal->updated_at));
        })
        ->addColumn('nominal', function($amal){
            return 'Rp.'.number_format($amal->nominal,2,',','.');
        })
        ->rawColumns([])
        ->make(true);
    }
    public function exportall()
    {

        $data = amal::all();

        Excel::create('Export All Riwayat Infaq dan Sodaqoh', function($excel) use ($data) {

            $excel->sheet('Export Riwayat Infaq dan Sodaqoh', function($sheet) use ($data) {

                $sheet->loadView('print.excel.amal',compact('data'));

            });

        })->export('xlsx');
    }

    public function export(Request $request)
    {
        if($request->start != null && $request->end != null){
            $data = amal::whereBetween('created_at',[$this->convert($request->start),$this->convert($request->end)])->get();
            $awal  = $request->start;
            $akhir = $request->end;

            Excel::create('Export Riwayat Infaq dan Sodaqoh '.$request->start.' s/d '.$request->end, function($excel) use ($data,$awal,$akhir) {

                $excel->sheet('Export Riwayat Infaq dan Sodaqoh', function($sheet) use ($data,$awal,$akhir) {

                    $sheet->loadView('print.excel.amal',compact('data','awal','akhir'));

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
    public function delsel(Request $request)
    {

        foreach($request->id as $id)
         {
          amal::destroy($id);
         }

    }


    public function int($rupiah)
    {
        $data = explode(',',$rupiah);
        $int  = str_replace('.','',$data[0]);
        return $int;
    }
    public function convert($value)
    {
        $d = explode('/', $value);
        $date = $d[2]."-".$d[0]."-".$d[1];
        return $date;
    }

 
}

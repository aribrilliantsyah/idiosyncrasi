<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Session;
use Excel;

use App\mal;
use App\m_ketetapan;

class MalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('interface.backend.pendataan.mal.index');
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
        $mal = new mal;
        $mal->nama = $request->nama;
        $mal->jk = $request->jk;
        $mal->alamat = $request->alamat;
        $mal->nominal = $request->nominal;
        $mal->bentuk = $request->bentuk;
        $mal->jenis = $request->jenis;
        $mal->status = date('Ym');
        $mal->save();

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
        $mal = mal::find($id);
        return $mal;
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
        $mal = mal::find($id);
        $mal->nama = $request->nama;
        $mal->jk = $request->jk;
        $mal->alamat = $request->alamat;
        $mal->nominal = $request->nominal;
        $mal->bentuk = $request->bentuk;
        $mal->jenis = $request->jenis;
        $mal->save();

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
    public function apimal(Request $request)
    {

        $mal = mal::where('status',date('Ym'));

        return Datatables::of($mal)
        ->addColumn('check', function($mal){
            return '<input type="checkbox" class="checkitem" name="delsel[]" value="'.$mal->id.'">';
        })
        ->addColumn('action', function($mal){
            return '<button onclick="editForm('.$mal->id.')" class="btn btn-xs btn-outline-accent m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x m-btn--pill m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="Ubah Data"><i class="la la-edit"></i></button>';
        })
        ->addColumn('tanggal', function($mal){
            return date('d/m/Y',strtotime($mal->updated_at));
        })
        ->addColumn('nominal', function($mal){
            if($mal->bentuk == "rupiah"){
                return 'Rp.'.number_format($mal->nominal,2,',','.');
            }elseif ($mal->bentuk == "gram") {
                return $mal->nominal." .gr";
            }elseif ($mal->bentuk == "kilogram") {
                return $mal->nominal." .Kg";
            }else{

            }
        })
        ->rawColumns(['check','action'])
        ->make(true);
    }
    public function apiHistory()
    {
        $mal = mal::all();

        return Datatables::of($mal)
        ->addColumn('tanggal', function($mal){
            return date('d/m/Y',strtotime($mal->updated_at));
        })
        ->addColumn('nominal', function($mal){
            if($mal->bentuk == "rupiah"){
                return 'Rp.'.number_format($mal->nominal,2,',','.');
            }elseif ($mal->bentuk == "gram") {
                return $mal->nominal." .gr";
            }elseif ($mal->bentuk == "kilogram") {
                return $mal->nominal." .Kg";
            }else{

            }
        })
        ->rawColumns([])
        ->make(true);
    }
    public function exportall()
    {

        $data = mal::all();

        Excel::create('Export All Riwayat Zakat Mal' .date('Y-m-d H:S'), function($excel) use ($data) {

            $excel->sheet('Export All Riwayat Zakat Mal', function($sheet) use ($data) {

                $sheet->loadView('print.excel.mal',compact('data'));

            });

        })->export('xlsx');
    }

    public function export(Request $request)
    {
        if($request->start != null && $request->end != null){
            $data = mal::whereBetween('created_at',[$this->convert($request->start),$this->convert($request->end)])->get();
            $awal  = $request->start;
            $akhir = $request->end;

            Excel::create('Export Riwayat Zakat Mal '.$request->start.' s/d '.$request->end, function($excel) use ($data,$awal,$akhir) {

                $excel->sheet('Export Riwayat Zakat Mal', function($sheet) use ($data,$awal,$akhir) {

                    $sheet->loadView('print.excel.mal',compact('data','awal','akhir'));

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
          mal::destroy($id);
         }

    }

    public function calc(Request $request)
    {
         $ket = m_ketetapan::where('jenis', $request->jenis)->first();
         
         return $ket;
    }
    
    public function convert($value)
    {
        $d = explode('/', $value);
        $date = $d[2]."-".$d[0]."-".$d[1];
        return $date;
    }

 
}

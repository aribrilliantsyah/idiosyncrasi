<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Session;
use Excel;

use App\fitrah;
use App\m_ketetapan;

class FitrahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('interface.backend.pendataan.fitrah.index');
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
        if ($request->jenis == "Uang") {
            $bentuk  = "rupiah";
            $nominal = m_ketetapan::where('jenis','Uang')->first()->ketetapan;
        }else{
            $bentuk = "kilogram";
            $nominal = m_ketetapan::where('jenis','Beras')->first()->ketetapan;
        }
        $fitrah = new fitrah;
        $fitrah->nama = $request->nama;
        $fitrah->jk = $request->jk;
        $fitrah->alamat = $request->alamat;
        $fitrah->jenis = $request->jenis;
        $fitrah->bentuk = $bentuk;
        $fitrah->nominal = $nominal;
        $fitrah->status = date('Ym');
        $fitrah->save();

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
        $fitrah = fitrah::find($id);
        return $fitrah;
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
        if ($request->jenis == "Uang") {
            $bentuk  = "rupiah";
            $nominal = m_ketetapan::where('jenis','Uang')->first()->ketetapan;
        }else{
            $bentuk = "kilogram";
            $nominal = m_ketetapan::where('jenis','Beras')->first()->ketetapan;
        }
        $fitrah = fitrah::find($request->id);
        $fitrah->nama = $request->nama;
        $fitrah->jk = $request->jk;
        $fitrah->alamat = $request->alamat;
        $fitrah->jenis = $request->jenis;
        $fitrah->bentuk = $bentuk;
        $fitrah->nominal = $nominal;
        $fitrah->save();

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
    public function apiFitrah(Request $request)
    {
        $fitrah = fitrah::where('status',date('Ym'));

        return Datatables::of($fitrah)
        ->addColumn('check', function($fitrah){
            return '<input type="checkbox" class="checkitem" name="delsel[]" value="'.$fitrah->id.'">';
        })
        ->addColumn('action', function($fitrah){
            return '<button onclick="editForm('.$fitrah->id.')" class="btn btn-xs btn-outline-accent m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x m-btn--pill m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="Ubah Data" data-original-title="Ubah Data"><i class="la la-edit"></i></button>';
        })
        ->addColumn('tanggal', function($fitrah){
            return date('d/m/Y',strtotime($fitrah->updated_at));
        })
        ->addColumn('nominal', function($fitrah){
            if($fitrah->bentuk == "rupiah"){
                return 'Rp.'.number_format($fitrah->nominal,2,',','.');
            }elseif ($fitrah->bentuk == "kilogram") {
                return $fitrah->nominal." .Kg";
            }else{

            }
        })
        ->rawColumns(['check','action'])
        ->make(true);
    }
    public function apiHistory()
    {
        $fitrah = fitrah::all();

        return Datatables::of($fitrah)
        ->addColumn('tanggal', function($fitrah){
            return date('d/m/Y',strtotime($fitrah->updated_at));
        })
        ->addColumn('nominal', function($fitrah){
            if($fitrah->bentuk == "rupiah"){
                return 'Rp.'.number_format($fitrah->nominal,2,',','.');
            }elseif ($fitrah->bentuk == "kilogram") {
                return $fitrah->nominal." .Kg";
            }else{

            }
        })
        ->rawColumns([])
        ->make(true);
    }
    public function exportall()
    {

        $data = fitrah::all();

        Excel::create('Export All Riwayat Zakat Fitrah', function($excel) use ($data) {

            $excel->sheet('Export All Riwayat Zakat Fitrah', function($sheet) use ($data) {

                $sheet->loadView('print.excel.fitrah',compact('data'));

            });

        })->export('xlsx');
    }

    public function export(Request $request)
    {
        if($request->start != null && $request->end != null){
            $data = fitrah::whereBetween('created_at',[$this->convert($request->start),$this->convert($request->end)])->get();
            $awal  = $request->start;
            $akhir = $request->end;

            Excel::create('Export Riwayat Zakat Fitrah '.$request->start.' s/d '.$request->end, function($excel) use ($data,$awal,$akhir) {

                $excel->sheet('Export Riwayat Zakat Fitrah', function($sheet) use ($data,$awal,$akhir) {

                    $sheet->loadView('print.excel.fitrah',compact('data','awal','akhir'));

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
          fitrah::destroy($id);
         }

    }

    //ketetaapan
    public function ket()
    {
        //
        return view('interface.backend.m_ketetapan.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ketedit($id)
    {
        //
        $ketetapan = m_ketetapan::find($id);
        return $ketetapan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ketupdate(Request $request)
    {
        //
        $m_ketetapan = m_ketetapan::find($request->id);
        $m_ketetapan->jenis = $request->jenis;
        $m_ketetapan->ketetapan = $request->ketetapan;
        $m_ketetapan->save();

    }
    public function apiKetetapan()
    {
        $m_ketetapan = m_ketetapan::all();
        return Datatables::of($m_ketetapan)
        ->addColumn('action', function($m_ketetapan){
            return '<a onclick="editForm('.$m_ketetapan->id.')" class="btn btn-xs btn-outline-accent m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x m-btn--pill m-btn--air" title="Ubah detail"><i class="la la-edit"></i></a>';
        })
        ->addColumn('ketetapan', function($m_ketetapan)
        {
            if($m_ketetapan->jenis === "Uang"){
                return 'Rp.'.number_format($m_ketetapan->ketetapan,2,',','.');
            }else if($m_ketetapan->jenis == "Beras"){
                return $m_ketetapan->ketetapan.' Kg';
            }else if($m_ketetapan->jenis === "Emas" || $m_ketetapan->jenis === "Perak"){
                return 'Rp.'.number_format($m_ketetapan->ketetapan,2,',','.').'/gram';
            }else{
                return "";
            }
        })
        ->rawColumns(['action','ketetapan'])
        ->make(true);
    }
    public function convert($value)
    {
        $d = explode('/', $value);
        $date = $d[2]."-".$d[0]."-".$d[1];
        return $date;
    }
    // public function count()
    // {
    //     $u = m_ketetapan::where('jenis', 'Uang')->first()->ketetapan;
    //     $b = m_ketetapan::where('jenis', 'Beras')->first()->ketetapan;

    //     $fitrah = fitrah::all();
    //     $count = $fitrah->count();

    //     $beras = fitrah::where('jenis', 'Beras')->count();
    //     $uang = fitrah::where('jenis', 'Uang')->count();

    //     $pb = $beras*$b;
    //     $pu = $uang*$u;

    //     return view('count.fitrah', compact('count','beras','uang','u','b','pb','pu'));
    // }


 
}

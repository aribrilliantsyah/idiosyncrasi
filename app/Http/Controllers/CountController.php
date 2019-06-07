<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\fitrah;
use App\mal;
use App\amal;
use App\m_ketetapan;
use App\count;
use App\share;
use Session;
use App\inout;

class CountController extends Controller
{
    //
    public function fitrah()
    {
    	$now = date('Ym');
    	$beras= fitrah::where('jenis','Beras')->where('status',$now)->count();
    	$uang = fitrah::where('jenis','Uang')->where('status',$now)->count();
    	$tberas = fitrah::where('jenis','Beras')->where('status',$now)->sum('nominal');
    	$tuang = fitrah::where('jenis','Uang')->where('status',$now)->sum('nominal');

        $data['Uang'] = 
        [
            'Muzzaki' => $uang.' Orang',
            'Total' => "Rp.".number_format($tuang,2,',','.'),
        ];
        $data['Beras'] = 
        [
            'Muzzaki' => $beras.' Orang',
            'Total' => $tberas.".Kg",
        ];
    	return $data;
    }

    public function mal()
    {
        $now = date('Ym');
      
        $data['Emas'] = 
        [
            'Muzzaki_Uang' => mal::where('jenis','Zakat Emas')->where('bentuk','rupiah')->where('status',$now)->count().' Orang',
            'Muzzaki_Perhiasan' => mal::where('jenis','Zakat Emas')->where('bentuk','gram')->where('status',$now)->count().' Orang',
            'Total_Uang' => "Rp.".number_format(mal::where('jenis','Zakat Emas')->where('bentuk','rupiah')->where('status',$now)->sum('nominal'),2,',','.'),
            'Total_Perhiasan' => mal::where('jenis','Zakat Emas')->where('bentuk','gram')->where('status',$now)->sum('nominal').'.gr'
        ];
        $data['Perak'] = 
        [
            'Muzzaki_Uang' => mal::where('jenis','Zakat Perak')->where('bentuk','rupiah')->where('status',$now)->count().' Orang',
            'Muzzaki_Perhiasan' => mal::where('jenis','Zakat Perak')->where('bentuk','gram')->where('status',$now)->count().' Orang',
            'Total_Uang' => "Rp.".number_format(mal::where('jenis','Zakat Perak')->where('bentuk','rupiah')->where('status',$now)->sum('nominal'),2,',','.'),
            'Total_Perhiasan' => mal::where('jenis','Zakat Perak')->where('bentuk','gram')->where('status',$now)->sum('nominal').'.gr'
        ];
        $data['Harta'] = 
        [
            'Muzzaki' => mal::where('jenis','Zakat Harta')->where('bentuk','rupiah')->where('status',$now)->count().' Orang',
            'Total' => "Rp.".number_format(mal::where('jenis','Zakat Harta')->where('bentuk','rupiah')->where('status',$now)->sum('nominal'),2,',','.')
        ];
        $data['Pertanian'] = 
        [
            'Muzzaki' => mal::where('jenis','Zakat Pertanian')->where('bentuk','kilogram')->where('status',$now)->count().' Orang',
            'Total' => mal::where('jenis','Zakat Pertanian')->where('bentuk','kilogram')->where('status',$now)->sum('nominal').'.Kg'
        ];
        $data['Temuan'] = 
        [
            'Muzzaki' => mal::where('jenis','Zakat Harta Temuan')->where('bentuk','rupiah')->where('status',$now)->count().' Orang',
            'Total' => "Rp.".number_format(mal::where('jenis','Zakat Harta Temuan')->where('bentuk','rupiah')->where('status',$now)->sum('nominal'),2,',','.')
        ];

        return $data;
    }

    public function amal()
    {
        $now = date('Ym');
        $infaq= amal::where('jenis','Infaq')->where('status',$now)->count();
        $tinfaq= amal::where('jenis','Infaq')->where('status',$now)->sum('nominal');
        $sodaqoh= amal::where('jenis','Sodaqoh')->where('status',$now)->count();
        $tsodaqoh= amal::where('jenis','Sodaqoh')->where('status',$now)->sum('nominal');


        $data['Infaq'] = 
        [
            'Donatur' => $infaq.' Orang',
            'Total' => "Rp.".number_format($tinfaq,2,',','.'),
        ];
        $data['Sodaqoh'] = 
        [
            'Donatur' => $sodaqoh.' Orang',
            'Total' => "Rp.".number_format($tsodaqoh,2,',','.'),
        ];
        return $data;
    }

    public function saveFitrah(Request $request)
    {

    	if($request->method == "create"){
            $model = new count;
            $model->jenis = "Fitrah";
            $model->ket   = $request->ket;
            $model->kode  = $request->kode;
            $model->status = "unverified";
            $model->save();
        }else if($request->method == "update"){
            $model = count::findorFail($request->id);
            $model->ket   = $request->ket;
            $model->save();
        }
    }
    public function saveMal(Request $request)
    {

        if($request->method == "create"){
            $model = new count;
            $model->jenis = "Mal";
            $model->ket   = $request->ket;
            $model->kode  = $request->kode;
            $model->status = "unverified";
            $model->save();
        }else if($request->method == "update"){
            $model = count::findorFail($request->id);
            $model->ket   = $request->ket;
            $model->save();
        }
    }
    public function saveAmal(Request $request)
    {

        if($request->method == "create"){
            $model = new count;
            $model->jenis = "Amal";
            $model->ket   = $request->ket;
            $model->kode  = $request->kode;
            $model->status = "unverified";
            $model->save();
        }else if($request->method == "update"){
            $model = count::findorFail($request->id);
            $model->ket   = $request->ket;
            $model->save();
        }
    }
    public function cekFitrah($cek)
    {
    	$model = count::where('jenis','fitrah');
    	$count['count'] = $model->where('kode',$cek)->count();
    	$count['id'] = isset($model->where('kode',$cek)->first()->id)? $model->where('kode',$cek)->first()->id : "" ;
    	return $count;
    }

    public function cekMal($cek)
    {
        $model = count::where('jenis','mal');
        $count['count'] = $model->where('kode',$cek)->count();
        $count['id'] = isset($model->where('kode',$cek)->first()->id)? $model->where('kode',$cek)->first()->id : "" ;
        return $count;
    }

    public function cekAmal($cek)
    {
        $model = count::where('jenis','amal');
        $count['count'] = $model->where('kode',$cek)->count();
        $count['id'] = isset($model->where('kode',$cek)->first()->id)? $model->where('kode',$cek)->first()->id : "" ;
        return $count;
    }

    public function listfitrah()
    {
    	$model = count::where('jenis','fitrah')->orderBy('created_at','DSC');
    	return Datatables::of($model)
        ->editColumn('status', function($model){
            if($model->status == "unverified"){
                return '<span class="m-badge m-badge--danger m-badge--wide">
                            Belum Terbagikan
                         </span>';
            }else{
                return '<span class="m-badge m-badge--success m-badge--wide">
                            Terbagikan
                         </span>';
            }
        })
        ->editColumn('action', function($model){
            if($model->status == "unverified"){
                return '<a href="/admin/pembagian/fitrah/'.$model->id.'" class="btn btn-success btn-sm m-btn--air m-btn--pill" id="button'.$model->id.'"><i class="fa fa-send"></i> Bagikan</a>';
            }else{
                return "";
            }
        })
        ->addColumn('tanggal', function($model){
            return date('d/m/Y',strtotime($model->created_at));
        })
        ->rawColumns(['status','action'])
        ->make(true);
    }
    public function listmal()
    {
        $model = count::where('jenis','mal')->orderBy('created_at','DSC');
        return Datatables::of($model)
        ->editColumn('status', function($model){
            if($model->status == "unverified"){
                return '<span class="m-badge m-badge--danger m-badge--wide">
                            Belum Terbagikan
                         </span>';
            }else{
                return '<span class="m-badge m-badge--success m-badge--wide">
                            Terbagikan
                         </span>';
            }
        })
        ->editColumn('action', function($model){
            if($model->status == "unverified"){
                return '<a href="/admin/pembagian/mal/'.$model->id.'" class="btn btn-success btn-sm m-btn--air m-btn--pill" id="button'.$model->id.'"><i class="fa fa-send"></i> Bagikan</a>';
            }else{
                return "";
            }
        })
        ->addColumn('tanggal', function($model){
            return date('d/m/Y',strtotime($model->created_at));
        })
        ->rawColumns(['status','action'])
        ->make(true);
    }
    public function listamal()
    {
        $model = count::where('jenis','amal')->orderBy('created_at','DSC');
        return Datatables::of($model)
        ->editColumn('status', function($model){
            if($model->status == "unverified"){
                return '<span class="m-badge m-badge--danger m-badge--wide">
                            Belum Terbagikan
                         </span>';
            }else{
                return '<span class="m-badge m-badge--success m-badge--wide">
                            Terbagikan
                         </span>';
            }
        })
        ->editColumn('action', function($model){
            if($model->status == "unverified"){
                return '<a href="/admin/pembagian/amal/'.$model->id.'" class="btn btn-success btn-sm m-btn--air m-btn--pill" id="button'.$model->id.'"><i class="fa fa-send"></i> Bagikan</a>';
            }else{
                return "";
            }
        })
        ->addColumn('tanggal', function($model){
            return date('d/m/Y',strtotime($model->created_at));
        })
        ->rawColumns(['status','action'])
        ->make(true);
    }
    public function sharefitrah($id)
    {
        $fitrah = count::findorFail($id);
        if ($fitrah->jenis != "Fitrah") {
            Session::flash("notif",[
                "level"=>"error",
                "title"=>"Oops..!",
                "message"=>"Data tidak sesuai dengan jenis..!"
            ]);
            return redirect('/admin/perolehan/fitrah');
        }
        if($fitrah->status == "unverified"){
            return view('interface.backend.perolehan.fitrah.share',compact('fitrah'));
        }else{
            Session::flash("notif",[
                "level"=>"error",
                "title"=>"Oops..!",
                "message"=>"Data telah di terbagikan sebelumnya..!"
            ]);
            return redirect('/admin/perolehan/fitrah');
        }
    }
    public function sharemal($id)
    {
        $mal = count::findorFail($id);
        if ($mal->jenis != "Mal") {
            Session::flash("notif",[
                "level"=>"error",
                "title"=>"Oops..!",
                "message"=>"Data tidak sesuai dengan jenis..!"
            ]);
            return redirect('/admin/perolehan/mal');
        }
        if($mal->status == "unverified"){
            return view('interface.backend.perolehan.mal.share',compact('mal'));
        }else{
            Session::flash("notif",[
                "level"=>"error",
                "title"=>"Oops..!",
                "message"=>"Data telah di terbagikan sebelumnya..!"
            ]);
            return redirect('/admin/perolehan/mal');
        }
    }
    public function shareamal($id)
    {
        $mal = count::findorFail($id);
        if ($mal->jenis != "Amal") {
            Session::flash("notif",[
                "level"=>"error",
                "title"=>"Oops..!",
                "message"=>"Data tidak sesuai dengan jenis..!"
            ]);
            return redirect('/admin/perolehan/amal');
        }
        if($mal->status == "unverified"){
            return view('interface.backend.perolehan.amal.share',compact('mal'));
        }else{
            Session::flash("notif",[
                "level"=>"error",
                "title"=>"Oops..!",
                "message"=>"Data telah di terbagikan sebelumnya..!"
            ]);
            return redirect('/admin/perolehan/amal');
        }
    }
    public function savesharefitrah(Request $request)
    {
        $share = new share();
        $share->jenis = "Fitrah";
        //array
        foreach (array_combine($request->mustahik, $request->jumlah) as $index => $value) {
           $ket[$index] = $value.' Orang';
            
        };
        $share->ket = $ket;
        $share->count_id = $request->id_count;
        $share->kode = date('Ym'); 
        $share->save();

        $model = count::findorFail($request->id_count);
        $model->status = "verified";
        $model->save();

        $inout = new inout();
        $inout->jenis = "Fitrah";
        $inout->jumlah = fitrah::where('status', date('Ym'))->count().' Orang';
        $inout->keterangan = 'Masuk';
        $inout->save();

        $inout = new inout();
        $inout->jenis = "Fitrah";
        $inout->jumlah = $request->total.' Orang';
        $inout->keterangan = 'Keluar';
        $inout->save();
    }
    public function savesharemal(Request $request)
    {
        $share = new share();
        $share->jenis = "Mal";
        //array

        if($request->personal != null){
            foreach (array_combine($request->personal, $request->jumlah_personal) as $index => $value) {
               $p[$index] = $value.' Orang';
            };
        }else{
               $p[""] = "";
        }
        if($request->lembaga != null){
            foreach (array_combine($request->lembaga, $request->jumlah_lembaga) as $index => $value) {
               $l[$index]  = $value.' Orang';
            };
        }else{
               $l[""] = "";
        }

        $all['Personal'] = $p;
        $all['Lembaga'] = $l;


        $share->ket = $all;
        $share->count_id = $request->id_count;
        $share->kode = date('Ym'); 
        $share->save();

        $model = count::findorFail($request->id_count);
        $model->status = "verified";
        $model->save();

        $inout = new inout();
        $inout->jenis = "Mal";
        $inout->jumlah = mal::where('status', date('Ym'))->count().' Orang';
        $inout->keterangan = 'Masuk';
        $inout->save();

        $inout = new inout();
        $inout->jenis = "Mal";
        $inout->jumlah = $request->total.' Orang';
        $inout->keterangan = 'Keluar';
        $inout->save();
    }
    public function saveshareamal(Request $request)
    {
        $share = new share();
        $share->jenis = "Amal";
        //array

        if($request->personal != null){
            foreach (array_combine($request->personal, $request->jumlah_personal) as $index => $value) {
               $p[$index] = $value.' Orang';
            };
        }else{
               $p[""] = "";
        }
        if($request->lembaga != null){
            foreach (array_combine($request->lembaga, $request->jumlah_lembaga) as $index => $value) {
               $l[$index]  = $value.' Orang';
            };
        }else{
               $l[""] = "";
        }

        $all['Personal'] = $p;
        $all['Lembaga'] = $l;


        $share->ket = $all;
        $share->count_id = $request->id_count;
        $share->kode = date('Ym'); 
        $share->save();

        $model = count::findorFail($request->id_count);
        $model->status = "verified";
        $model->save();

        $inout = new inout();
        $inout->jenis = "Infaq Dan Sodaqoh";
        $inout->jumlah = mal::where('status', date('Ym'))->count().' Orang';
        $inout->keterangan = 'Masuk';
        $inout->save();

        $inout = new inout();
        $inout->jenis = "Infaq Dan Sodaqoh";
        $inout->jumlah = $request->total. ' Orang';
        $inout->keterangan = 'Keluar';
        $inout->save();
    }

}

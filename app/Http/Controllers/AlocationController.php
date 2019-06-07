<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\share;

class AlocationController extends Controller
{
    //
    public function listfitrah()
    {
    	$model = share::with('count')->where('jenis','fitrah')->orderBy('created_at','DSC');
    	 return Datatables::of($model)
        ->editColumn('action', function($model){
            return '<div class="m-dropdown m-dropdown--inline m-dropdown--small m-dropdown--arrow m-dropdown--align-center" data-dropdown-toggle="hover" aria-expanded="true">
                    <a href="#" class="m-dropdown__toggle btn btn-info btn-sm m-btn--air m-btn--pill dropdown-toggle">
                        Laporan
                    </a>
                    <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                        <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                                <div class="m-dropdown__content">
                                    <ul class="m-nav">
                                        <li class="m-nav__section m-nav__section--first">
                                            <span class="m-nav__section-text">
                                                Pilih
                                            </span>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="/admin/laporan/fitrah/'.$model->id.'" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                <span class="m-nav__link-text">
                                                    Posting
                                                </span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="/admin/pdf/fitrah/'.$model->id.'" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                <span class="m-nav__link-text">
                                                    Print PDF
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        })
        ->addColumn('tanggal', function($model){
            return date('d/m/Y',strtotime($model->created_at));
        })
        ->rawColumns(['status','action'])
        ->make(true);
    }
    public function createl($jenis,$id)
    {
        if($jenis != 'fitrah' && $jenis != 'mal' && $jenis != 'amal'){
            return view('errors.404');
        }
    	$l = share::find($id);
        if(strtolower($l->jenis) != $jenis){
            return view('errors.404');
        }else{
            $laporan = $l;
            if($jenis == 'fitrah'){
            $judul = 'Laporan Zakat Fitrah Bulan '.date('F').' '.date('Y');
            }elseif($jenis == 'mal'){
                $judul = 'Laporan Zakat Mal Bulan '.date('F').' '. date('Y');
            }else{
                 $judul = 'Laporan Infaq Dan Sodaqoh '.date('F').' '. date('Y');
            }
            return view('interface.backend.blog.create',compact('laporan','jenis','judul'));
        }
    }
    public function createpdf($jenis,$id)
    {
        if($jenis != 'fitrah' && $jenis != 'mal' && $jenis != 'amal'){
            return view('errors.404');
        }
        $l = share::find($id);
        if(strtolower($l->jenis) != $jenis){
            return view('errors.404');
        }else{
            $laporan = $l;
            if($jenis == 'fitrah'){
            $judul = 'Laporan Zakat Fitrah Bulan '.date('F').' '.date('Y');
            }elseif($jenis == 'mal'){
                $judul = 'Laporan Zakat Mal Bulan '.date('F').' '. date('Y');
            }else{
                 $judul = 'Laporan Infaq Dan Sodaqoh '.date('F').' '. date('Y');
            }
            return view('print.print',compact('laporan','jenis','judul'));
        }
    }
    public function listmal()
    {
        
        $model = share::with('count')->where('jenis','mal')->orderBy('created_at','DSC');
         return Datatables::of($model)
        ->editColumn('action', function($model){
            return '<div class="m-dropdown m-dropdown--inline m-dropdown--small m-dropdown--arrow m-dropdown--align-center" data-dropdown-toggle="hover" aria-expanded="true">
                    <a href="#" class="m-dropdown__toggle btn btn-info btn-sm m-btn--air m-btn--pill dropdown-toggle">
                        Laporan
                    </a>
                    <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                        <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                                <div class="m-dropdown__content">
                                    <ul class="m-nav">
                                        <li class="m-nav__section m-nav__section--first">
                                            <span class="m-nav__section-text">
                                                Pilih
                                            </span>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="/admin/laporan/fitrah/'.$model->id.'" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                <span class="m-nav__link-text">
                                                    Posting
                                                </span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="/admin/pdf/fitrah/'.$model->id.'" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                <span class="m-nav__link-text">
                                                    Print PDF
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        })
        ->addColumn('tanggal', function($model){
            return date('d/m/Y',strtotime($model->created_at));
        })
        ->rawColumns(['status','action'])
        ->make(true);
    }
    public function listamal()
    {
        $model = share::with('count')->where('jenis','amal')->orderBy('created_at','DSC');
         return Datatables::of($model)
        ->editColumn('action', function($model){
            return '<div class="m-dropdown m-dropdown--inline m-dropdown--small m-dropdown--arrow m-dropdown--align-center" data-dropdown-toggle="hover" aria-expanded="true">
                    <a href="#" class="m-dropdown__toggle btn btn-info btn-sm m-btn--air m-btn--pill dropdown-toggle">
                        Laporan
                    </a>
                    <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                        <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                                <div class="m-dropdown__content">
                                    <ul class="m-nav">
                                        <li class="m-nav__section m-nav__section--first">
                                            <span class="m-nav__section-text">
                                                Pilih
                                            </span>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="/admin/laporan/amal/'.$model->id.'" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                <span class="m-nav__link-text">
                                                    Posting
                                                </span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="/admin/pdf/amal/'.$model->id.'" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                <span class="m-nav__link-text">
                                                    Print PDF
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        })
        ->addColumn('tanggal', function($model){
            return date('d/m/Y',strtotime($model->created_at));
        })
        ->rawColumns(['status','action'])
        ->make(true);
    }
}

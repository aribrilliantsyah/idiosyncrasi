<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\KategoriGallery as m_kategori;

class KategoriGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.master.kategori_gallery.index');
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
        $mal = new m_kategori;
        $mal->name = $request->kategori;
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
        $m_kategori = m_kategori::find($id);
        return $m_kategori;
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
        $m_kategori = m_kategori::find($id);
        $m_kategori->name = $request->kategori;
        $m_kategori->save();

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
    public function apiKategori()
    {
        $m_kategori = m_kategori::all();

        return Datatables::of($m_kategori)
        ->addColumn('check', function($m_kategori){
            return '<input type="checkbox" class="checkitem" name="delsel[]" value="'.$m_kategori->id.'">';
        })
        ->addColumn('action', function($m_kategori){
            return '<a onclick="editForm('.$m_kategori->id.')" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--air m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i></a>';
        })
        ->rawColumns(['check','action'])
        ->make(true);
    }

    public function delsel(Request $request)
    {
        foreach($request->id as $id){
          m_kategori::destroy($id);
        }
    }
 
}

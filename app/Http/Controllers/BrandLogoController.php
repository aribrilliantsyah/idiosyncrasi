<?php

namespace App\Http\Controllers;

use App\BrandLogo;
use Illuminate\Http\Request;
use BaranLogo;
use Image;
use File;
use Session;

class BrandLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = BrandLogo::paginate(6);
        return view('backend.brand.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.brand.create');
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
        $this->validate($request,[
            'image' => 'required|image:min:2048',
        ]);
        $rdm = str_random(18);
        $brand = new BrandLogo();
        $brand->nama = $rdm;
        $pic = $request->file('image');
        $filename = $rdm.'.'.$pic->getClientOriginalExtension();
        $old_lokasi= $filename;
        $filepath = public_path('/img/brand/'. $brand->img);
        if($brand->img){
            try {
                File::delete($filepath);
            } catch(FileNotFoundException $e) {

            }
        }
        $cover= Image::make($pic)->save( public_path('/img/brand/'.$filename) );
        $brand->img = $filename;
        $brand->save();

        Session::flash("notif",[
            "level"=>"success",
            "title"=>"Berhasil",
            "message"=>"Menambah Brand"
        ]);
        return redirect('/admin/brand/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrandLogo  $brandLogo
     * @return \Illuminate\Http\Response
     */
    public function show(BrandLogo $brandLogo)
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
        $model = BrandLogo::findOrFail($id);
        return view('backend.brand.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrandLogo  $brandLogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'image' => 'required|image:min:2048',
        ]);
        $brand = BrandLogo::findOrFail($id);
        $pic = $request->file('image');
        $filename = $brand->nama.'.'.$pic->getClientOriginalExtension();
        $old_lokasi= $filename;
        $filepath = public_path('/img/brand/'. $brand->img);
        if($brand->img){
            try {
                File::delete($filepath);
            } catch(FileNotFoundException $e) {

            }
        }
        $cover= Image::make($pic)->save( public_path('/img/brand/'.$filename) );
        $brand->img = $filename;
        $brand->save();

        Session::flash("notif",[
            "level"=>"success",
            "title"=>"Berhasil",
            "message"=>"Mengubah Brand"
        ]);
        return redirect('/admin/brand/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrandLogo  $brandLogo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model = BrandLogo::find($id);
        if($model->img){
            $old_lokasi = $model->img;
            $cover = public_path('/img/brand/'.$model->img);

            try {
                File::delete($cover);
            } catch(FileNotFoundException $e) {

            }
            $model->delete();
        }
        Session::flash("notif",[
            "level"=>"danger",
            "title"=>"Berhasil",
            "message"=>"Menghapus Brand"
        ]);
        return redirect('/admin/brand/');
    }
}

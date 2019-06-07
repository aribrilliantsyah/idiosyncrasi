<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use BaranLogo;
use Image;
use File;
use Session;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Slide::paginate(6);
        return view('backend.slide.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.slide.create');
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
        $slide = new Slide();
        $slide->order = '0';
        $pic = $request->file('image');
        $filename = $rdm.'.'.$pic->getClientOriginalExtension();
        $old_lokasi= $filename;
        $filepath = public_path('/img/slide/'. $slide->img);
        if($slide->img){
            try {
                File::delete($filepath);
            } catch(FileNotFoundException $e) {

            }
        }
        $cover= Image::make($pic)->save( public_path('/img/slide/'.$filename) );
        $slide->img = $filename;
        $slide->save();

        Session::flash("notif",[
            "level"=>"success",
            "title"=>"Berhasil",
            "message"=>"Menambah slide"
        ]);
        return redirect('/admin/slide/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $Slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $Slide)
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
        $model = Slide::findOrFail($id);
        return view('backend.slide.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $Slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'image' => 'required|image:min:2048',
        ]);
        $slide = Slide::findOrFail($id);
        $pic = $request->file('image');
        $filename = $slide->nama.'.'.$pic->getClientOriginalExtension();
        $old_lokasi= $filename;
        $filepath = public_path('/img/slide/'. $slide->img);
        if($slide->img){
            try {
                File::delete($filepath);
            } catch(FileNotFoundException $e) {

            }
        }
        $cover= Image::make($pic)->save( public_path('/img/slide/'.$filename) );
        $slide->img = $filename;
        $slide->save();

        Session::flash("notif",[
            "level"=>"success",
            "title"=>"Berhasil",
            "message"=>"Mengubah slide"
        ]);
        return redirect('/admin/slide/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $Slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model = Slide::find($id);
        if($model->img){
            $old_lokasi = $model->img;
            $cover = public_path('/img/slide/'.$model->img);

            try {
                File::delete($cover);
            } catch(FileNotFoundException $e) {

            }
            $model->delete();
        }
        Session::flash("notif",[
            "level"=>"danger",
            "title"=>"Berhasil",
            "message"=>"Menghapus slide"
        ]);
        return redirect('/admin/slide/');
    }
}

<?php

namespace App\Http\Controllers;

use App\ContentSetup;
use Illuminate\Http\Request;
use File;
use Image;
use Session;

class ContentSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $content = ContentSetup::first();
        return view('backend.content.index', compact('content'));
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
        
        $content = ContentSetup::first();
        $content->email = $request->email;
        $content->facebook = $request->facebook;
        $content->twitter = $request->twitter;
        $content->instagram = $request->instagram;
        $content->no_tlp = $request->no_tlp;
        $content->nama_web = $request->nama_web;
        $content->about = $request->about;
        $content->alamat = $request->alamat;
        $content->lat = $request->lat;
        $content->lng = $request->lng;
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $filename = 'logo.'.$logo->getClientOriginalExtension();
            $old_lokasi= $filename;
            $filepath = public_path('/img/'. $content->logo);
            if($content->logo){
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {
    
                }
            }
            $cover= Image::make($logo)->save( public_path('/img/'.$filename) );
            $content->logo = $filename;

        }
        $content->save();

        Session::flash("notif",[
            "level"=>"success",
            "title"=>"Berhasil",
            "message"=>"Diperbaharui"
        ]);

        return redirect('admin/content_setup');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContentSetup  $contentSetup
     * @return \Illuminate\Http\Response
     */
    public function show(ContentSetup $contentSetup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContentSetup  $contentSetup
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentSetup $contentSetup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContentSetup  $contentSetup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContentSetup $contentSetup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContentSetup  $contentSetup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentSetup $contentSetup)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use DB;

class GuestController extends Controller
{
    //
    public function post(){
        return view('interface.frontend.post.index');
    }
    public function all(){
        $posts1 = post::orderBy('created_at','desc')->paginate(4);
        return view('interface.frontend.post.all')->with(compact('posts1'));
    }
    public function show($slug)
    {
        $data  = post::where('slug', $slug)->first();
        $views= $data->views + 1;
        $data->views=$views;
        $data->save();

        return view('interface.frontend.post.show',compact('data'));
    }
    public function filter($key)
    {
        $table = DB::table('posts')->join('m_kategoris', 'm_kategoris.id','=','posts.kategori_id')
        ->select('posts.*','m_kategoris.kategori')
        ->where('kategori',$key);
        $result= $table->paginate(5);
        $count= $table->count();
        $key= $key;
        $i="kategori";

        return view('interface.frontend.post.filter',compact('result','count','key','i'));
    }

    public function search(Request $request)
    {
        $table = DB::table('posts')->join('m_kategoris', 'm_kategoris.id','=','posts.kategori_id')
        ->select('posts.*','m_kategoris.kategori')
        ->where('judul', 'like', '%'.$request->search.'%')
        ->orWhere('content', 'like', '%'.$request->search.'%')
        ->orWhere('kategori', 'like', '%'.$request->search.'%');
        $result= $table->paginate(5);
        $count= $table->count();
        $key= $request->search;
        $i="search";

        return view('interface.frontend.post.filter',compact('result','count','key','i'));
    }
    public function map()
    {
        return view('interface.frontend.map');
    }
}
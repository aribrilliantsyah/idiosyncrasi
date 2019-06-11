<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\BrandLogo;
use App\Slide;
use App\Post;

class FrontOfficeController extends Controller
{
    //
    public function index(){
        $data['gallery'] = Gallery::all(); 
        $data['brand'] = BrandLogo::all(); 
        $data['slide'] = Slide::all();
        $data['slide_status'] = true;

        return view('frontend.index',$data);
    }

    public function blog(){
        $data['blog'] =Post::paginate(6);
        return view('frontend.blog', $data);
    }

    public function blog_detail($slug){
        $post = Post::where('slug', $slug)->first();
        $post->views = $post->views + 1;
        $post->save();

        $data['blog'] = $post;
        return view('frontend.detail_blog', $data);
    }
}

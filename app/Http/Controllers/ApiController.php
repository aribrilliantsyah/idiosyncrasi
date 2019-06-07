<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\content;
use App\sosmed;
use App\fitrah;
use App\mal;
use App\amal;   
use App\agenda;
use DB;
use Auth;

class ApiController extends Controller
{
    //
    public function post()
    {
    	$post = post::all();
    	return $post;
    }
    public function content()
    {
    	$content = content::all();
    	return $content;
    }


    public function listdata()
    {
        return post::with('kategori')->get();
    }

    public function showdata($id)
    {
        return post::with('kategori')->where('id',$id)->get();
    }


    public function listcontent()
    {
        $quotes = $this->d_content('quotes');
        $tentang = $this->d_content('tentang');
        $visi = $this->d_content('visi');
        $misi= $this->d_content('misi');
        $lokasi= $this->d_content('lokasi');
        $lat= $this->d_content('lat');
        $lng= $this->d_content('lng');

        $home[] = ['quotes'=>$quotes,
                 'tentang'=>$tentang,
                 'visi'=>$visi,
                 'misi'=>$misi,
                 'lokasi'=>$lokasi,
                 'lat'=>$lat,
                 'lng'=>$lng];
        return $home;
    }

    public function coursel()
    {
        $slide1= $this->d_content('slide1');
        $slide2= $this->d_content('slide2');
        $slide3= $this->d_content('slide3');

        $slide = [
                    '0' => $slide1,
                    '1' => $slide2,
                    '2' => $slide3
                ];

        return $slide;


    }
    public function donatur()
    {
        $f=fitrah::count();
        $m=mal::count();
        $a=amal::count();

        $total=($f+$m+$a);
        if($total == 0){
            return $total;
        }else{
            return $total-1;
        }

       
    }
    public function kontak()
    {
        $phone = $this->d_content('phone');
        $email = $this->d_content('email');
        $fb = $this->sosmed('fb');
        $twitter = $this->sosmed('twitter');
        $ig = $this->sosmed('ig');
        $gplus = $this->sosmed('gplus');

        $kontak[] = ['phone'=>$phone,
                 'email'=>$email,
                 'fb'=>$fb,
                 'twitter'=>$twitter,
                 'ig'=>$ig,
                 'gplus'=>$gplus];
        return $kontak;

    }
    public function agenda()
    {
        return agenda::all();
    }

    public function d_content($value)
    {
        return content::where('jenis',$value)->first()->ket;
    }
    public function sosmed($value)
    {
        return sosmed::where('name',$value)->first()->url;
    }
    public function search(Request $request)
    {
        $table = DB::table('posts')->join('m_kategoris', 'm_kategoris.id','=','posts.kategori_id')
        ->select('posts.*','m_kategoris.kategori')
        ->where('judul', 'like', '%'.$request->search.'%')
        ->orWhere('content', 'like', '%'.$request->search.'%')
        ->orWhere('kategori', 'like', '%'.$request->search.'%');
        return $table->get();
        // $count= $table->count();
        // $key= $request->search;
        // $i="search";
    }
    public function login(Request $request)
    {
        $credentials = 
        array(
            'email' => $request->email,
            'password' => $request->password
        );
            if(Auth::attempt($credentials))
            {
                 $data['id']=Auth::user()->id;
                 $data['name']=Auth::user()->name;
                 $data['email']=Auth::user()->email;
                 $data['photo']=Auth::user()->foto;

                 return $data;
            }else{
                 return 0;
            }
    }


}

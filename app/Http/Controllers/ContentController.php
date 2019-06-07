<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;
use File;

use App\content;
use App\agenda;
use App\sosmed;

class ContentController extends Controller
{
    //
    public function content(Request $request)
    {
    	if($request->type == "kontak"){
    		$c = content::where('jenis', 'lokasi')->first();
			$c->ket = $request->lokasi;
			$c->save();

			$c = content::where('jenis', 'email')->first();
			$c->ket = $request->email;
			$c->save();

			$c = content::where('jenis', 'phone')->first();
			$c->ket = $request->phone;
			$c->save();
    	}elseif($request->type == "map"){
            $c = content::where('jenis', 'lokasi')->first();
            $c->ket = $request->lokasi;
            $c->save();

            $c = content::where('jenis', 'lat')->first();
            $c->ket = $request->lat;
            $c->save();

            $c = content::where('jenis', 'lng')->first();
            $c->ket = $request->lng;
            $c->save();
        }else{
    	    $c = content::where('jenis', $request->type)->first();
			$c->ket = $request->content;
			$c->save();
    	}
    }
    public function listagenda()
    {
    	return agenda::all();
    }

    public function showagenda($id)
    {
    	return agenda::find($id);
    }

    public function saveagenda(Request $request)
    {
    	if($request->method == "add"){
			$agenda = new agenda();    	
            $agenda->kegiatan = $request->kegiatan;
            $agenda->tgl_kegiatan = $request->tgl_kegiatan;
            $agenda->keterangan = $request->keterangan;
            $agenda->save();	
    	}elseif($request->method == "edit"){
    		$agenda = agenda::find($request->id);
            $agenda->kegiatan = $request->kegiatan;
            $agenda->tgl_kegiatan = $request->tgl_kegiatan;
            $agenda->keterangan = $request->keterangan;
            $agenda->save();
    	}else{
            echo "error";
        }

    }
    public function delsel(Request $request)
    {

        foreach($request->id as $id)
         {
          agenda::destroy($id);
         }

    }

    public function sosmed(Request $request)
    {
       $this->editsosmed('fb',$request->fb);
       $this->editsosmed('twitter',$request->twitter);
       $this->editsosmed('gplus',$request->gplus);
       $this->editsosmed('ig',$request->ig);
    }
    public function editsosmed($name,$value)
    {
        $e=sosmed::where('name',$name)->first();
        $e->url=$value;
        $e->save();
    }
    public function slide($id)
    {
        $slide = 'slide'.$id;
        $model = content::where('jenis',$slide)->first();

        return $model;
    }
    public function saveslide(Request $request,$id)
    {
        $slide = 'slide'.$id;

        $model = content::where('jenis',$slide)->first();
        foreach ($model->ket as $key => $value) {
            if($request->hasFile('image')){
                if($key){
                    $delete=public_path('/img/slide/' . $key );
                    try {
                        File::delete($delete);
                    } catch(FileNotFoundException $e) {

                    }

                }

                $picture = $request->file('image');
                $thumb=Image::make($picture)->resize(1300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $filename = $slide.'.'. $picture->getClientOriginalExtension();

                $image = Image::canvas(1200, 700);
                $image->insert($thumb, 'center');
                $image->save( public_path('/img/slide/' . $filename ));

                // //cover
                // $image=Image::make($picture)->resize(1200, 700, function ($constraint) {
                //     $constraint->aspectRatio();
                // });
                // $image->save(public_path('/img/slide/' . $filename));
                $d[$filename] = $request->ket_slide;
            }else{
                $d[$key] = $request->ket_slide;                
            }

        }
        $model->ket = $d;
        $model->save();
    }
}

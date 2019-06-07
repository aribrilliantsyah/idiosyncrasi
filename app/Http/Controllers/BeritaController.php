<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use Session;
use Image;
use File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface.backend.blog.create');
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
            'title'       => 'required|min:5|unique:posts,judul',
            'content'     => 'required|min:5',
            'kategori_id' => 'required',
            'image' => 'image:min:2048'
          ],
          [
            'title.required' => 'Judul Tidak Boleh Kosong',
            'title.min' => 'Judul Minimal 5 Karakter',
            'title.unique' => 'Judul Sudah digunakan',
            'content.required' => 'Deskripsi tidak boleh kosong',
            'content.min' => 'Deskripsi Minimal 5 Karakter',
            'kategori_id.required' => 'Kategori harus di isi',
            'image.image' => 'File harus berupa gambar',
            'image.min' => 'Ukuran maksimal 2048 Mb'
          ]);

        $post = new post;
        $post->judul = $request->title;
        $post->slug = Str::slug($request->get('title'));
        $post->kategori_id = $request->kategori_id;
        $post->content = $request->content;
        if($request->hasFile('image')){
            $picture = $request->file('image');
            $filename = "picture_".str_random(6).'.' . $picture->getClientOriginalExtension();

            //thumb
            $thumb=Image::make($picture)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $c_thumb = Image::canvas(100, 100);
            $c_thumb->insert($thumb, 'center');
            $c_thumb->save( public_path('/img/thumb/' . $filename ));
            //cover
            $cover=Image::make($picture)->resize(620, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            $cover->save( public_path('/img/cover/' . $filename ));
            $post->picture = $filename; 
            $post->save();
        }
        $post->save();

        Session::flash("notif",[
            "level"=>"success",
            "title"=>"Berhasil",
            "message"=>"Menambahkan Postingan"
        ]);
        return redirect('/admin/blog/post');

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
        $model = post::findOrFail($id);
        return view('interface.backend.blog.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = post::findOrFail($id);
        return view('interface.backend.blog.edit',compact('model'));
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
           $this->validate($request,[
                'title'       => 'required|min:5',
                'content'     => 'required|min:5',
                'kategori_id' => 'required',
                'image' => 'image:min:2048'
              ],
              [
                'title.required' => 'Judul Tidak Boleh Kosong',
                'title.min' => 'Judul Minimal 5 Karakter',
                'content.required' => 'Deskripsi tidak boleh kosong',
                'content.min' => 'Deskripsi Minimal 5 Karakter',
                'kategori_id.required' => 'Kategori harus di isi',
                'image.image' => 'File harus berupa gambar',
                'image.min' => 'Ukuran maksimal 2048 Mb'
              ]);

            $post = post::findOrFail($id);
            $post->judul = $request->title;
            $post->slug = Str::slug($request->get('title'));
            $post->kategori_id = $request->kategori_id;
            $post->content = $request->content;
            if($request->hasFile('image')){
                $picture = $request->file('image');
                $filename = "picture_".str_random(6).'.' . $picture->getClientOriginalExtension();
                //delete
                if($post->picture)
                {
                    $old_lokasi=$post->picture;
                    $cover=public_path('/img/cover/' . $post->picture );
                    $thumb=public_path('/img/thumb/' . $post->picture );
                    try {
                        File::delete($cover);
                        File::delete($thumb);
                    } catch(FileNotFoundException $e) {

                    }
                }
                //thumb
                $thumb=Image::make($picture)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $c_thumb = Image::canvas(100, 100);
                $c_thumb->insert($thumb, 'center');
                $c_thumb->save( public_path('/img/thumb/' . $filename ));
                //cover
                $cover=Image::make($picture)->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $cover->save( public_path('/img/cover/' . $filename ));
                $post->picture = $filename; 
                $post->save();
            }
            $post->save();

            Session::flash("notif",[
                "level"=>"success",
                "title"=>"Berhasil",
                "message"=>"Mengubah Postingan"
            ]);
            return redirect('/admin/blog/post');
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
    public function delete(Request $request)
    {
        $model = post::findOrFail($request->id);
        if($model->picture)
            {
                $old_lokasi=$model->picture;
                $cover=public_path('/img/cover/' . $model->picture );
                $thumb=public_path('/img/thumb/' . $model->picture );
                try {
                    File::delete($cover);
                    File::delete($thumb);
                } catch(FileNotFoundException $e) {

                }
                $model->delete();
            }
        $model->delete();

    }
    public function apiPost()
    {
        $post = post::select(['id','judul','kategori_id','content','picture','updated_at']);

        return Datatables::of($post)
        ->addColumn('check', function($post){
            return '<input type="checkbox" class="checkitem" name="delsel[]" value="'.$post->id.'">';
        })
        ->editColumn('picture', function($post){
            if($post->picture != null){
              return '<img src="/img/thumb/'.$post->picture.'" style="border-radius: 50px; height: 90px; width: 90px;">';
            }else{
              return '<img src="/img/thumb/no.png" style="border-radius: 50px; height: 90px; width: 90px;">';
            }
            
        })
        ->addColumn('action', function($post){
            return '<a href="/admin/berita/'.$post->id.'/edit" class="btn btn-xs btn-outline-accent m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x m-btn--pill m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="Ubah Data"><i class="fa fa-pencil"></i>
                      </a>
                      <a href="/admin/berita/'.$post->id.'" class="btn btn-xs btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x m-btn--pill m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="Ubah Data"><i class="fa fa-arrow-right"></i></a>';
        })
        ->addColumn('content', function($post){
            $content = preg_replace("/<img[^>]+\>/i", "", $post->content);
            return substr($content, 0,30).'...';
        })
        ->addColumn('tanggal', function($post){
            return date('d/m/Y',strtotime($post->updated_at));
        })
        ->rawColumns(['check','picture','action','content'])
        ->make(true);
    }

    public function delsel(Request $request)
    {

        foreach($request->id as $id)
         {
          post::destroy($id);
         }

    }
}

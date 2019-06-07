<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use Session;
use Image;
use Hash;
use Validator;
use App\User;

class ProfileController extends Controller
{
    //
    public function update(Request $request)
    {
    	$user = Auth::user();
        
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->description = $request->description;
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $filename = "user".$user->id.'.' . $foto->getClientOriginalExtension();
            if($user->foto && $user->foto != 'default.png')
            {
                $old_lokasi=$user->foto;
                $filepath=public_path('/img/foto/' . $user->foto );
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {

                }
            }
            Image::make($foto)->resize(100, 100)->save( public_path('/img/foto/' . $filename ) );
            $user = Auth::user();
            $user->foto = $filename;
            $user->save();
        }
        $user->save();

    }
    //validasi
    public function old(Request $request)
    {
        $password=Auth::user()->password;

        if (Hash::check($request->password , $password))
        {
            echo 1;
        }else{
            echo 0;
        }
    }
    //validasi email
    public function email(Request $request)
    {
        $email = User::where('email',$request->email)->count();
        if(Auth::check() && Auth::user()->email){
            if($request->email === Auth::user()->email) {
                echo "0";
            }else if($email > 0){
                echo "1";
            }
        }else{
            if ($email > 0) {
                echo "1";
            }else{
                echo "0";
            }
        }
        
    }

    public function image(Request $request)
    {
        $validator = Validator::make($request->only('foto'), 
            ['foto' => 'mimes:jpeg,jpg,png,bmp,svg']
        );  

        if ($validator->fails())
        {
            echo "1";
        }else{
            echo "0";
        }
    }

    public function password(Request $request)
    {
        $user = Auth::user();

        $user->password = bcrypt($request->new);
        $user->save();
    }

    //redirect
    public function redirect()
    {
        Session::flash("notif",[
            "level"=>"success",
            "title"=>"Berhasil",
            "message"=>"Profile pengguna di perbaharui"
        ]);
        return redirect('/admin/profile');
    }
}

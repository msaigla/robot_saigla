<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\HttpFoundation\File\File;

class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }

    public function otherProfile($user_id){
        $user = User::where('id', $user_id)->first();
        if(Auth::user() && Auth::user()->id == $user->id)
            return view('home');
        return view('profiles.other_user', [
            'user' => $user,
        ]);
    }


    public function addProfile(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        if ($request->hasFile('avatar')) {
            $url = DB::table('users')->where('id', Auth::user()->id)->value('avatar');
            app(Filesystem::class)->delete(public_path($url));
            $token = sha1(time());
            $file = $request->File('avatar');
            $img = Image::make($file);
            $width = $img->width();
            $height = $img->height();
            $img = $width <= $height ? $img->crop($width, $width)->resize(200, 200)->save(public_path() . '/uploads/avatars/' . $token . Auth::user()->id . '.png') : $img->crop($height, $height)->resize(200, 200)->save(public_path() . '/uploads/avatars/' . $token . Auth::user()->id . '.png');
            //$file->move(public_path() . '/uploads/avatars/' , $token . Auth::user()->id . '.png');
            $url = '/uploads/avatars/' . $token . Auth::user()->id . '.png';
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'name' => $request->input('name'),
                    'aboutOneself' => $request->input('aboutOneself'),
                    'receiveLetter' => $request->input('receiveLetter'),
                    'birthday' => $request->input('birthday'),
                    'avatar' => $url,
                ]);

            //open image
//            $img = Image::make($url);
//            $img->resize(400, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            // read height of image
//            $height = $img->height();
//            // resize only the width of the image
//            if($height < 400) $img->resize($height, null);
//            // resize only the height of the image
//            if(400 < $height) $img->resize(null, 400);
            return redirect('/home')->with('status', 'Профиль изменен.');
        }else {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'name' => $request->input('name'),
                    'aboutOneself' => $request->input('aboutOneself'),
                    'receiveLetter' => $request->input('receiveLetter'),
                    'birthday' => $request->input('birthday'),
                ]);
            return redirect('/home')->with('status', 'Профиль изменен.');
        }
    }
}

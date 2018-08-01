<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }

    public function addProfile(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        if (Input::hasFile('avatar')) {
            $file = Input::file('avatar');
            $file->move(public_path() . '/uploads/avatars/' , Auth::user()->id);
            $url = URL::to("/") . '/uploads/avatars/' . Auth::user()->id;
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'avatar' => $url,
                ]);
        }
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

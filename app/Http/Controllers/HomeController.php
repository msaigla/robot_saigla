<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user() != null) {
            $request->user()->authorizeRoles(['Пользователь', 'Админ']);
            return view('home');
        }
        else
            return back()->with('status', 'Вы не авторизованы!');
    }

    public function refreshCaptcha(){
        return response()->json(['captcha' => captcha_img()]);
    }
    /*
    public function someAdminStuff(Request $request)
    {
      $request->user()->authorizeRoles('manager');
      return view(‘some.view’);
    }
    */
}

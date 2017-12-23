<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Menu;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAuth = Auth::User();
        // if(Menu::IsEmpty($userAuth->id)){
        //     $menus = new Menu;
        // }else{
        // }
        $menus = Menu::where('user_id','=',$userAuth->id)->get();
        $user = new User;
        // $all_kode_menu = Menu::RandomCode();
        return view('home',compact('menus','user'));
    }
}

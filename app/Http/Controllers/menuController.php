<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
use DB;

class menuController extends Controller
{
    
    public function menu($request)
	{
        $shop = \App\shop::All();
		$name = \App\shop::where('id',$request)->get();
        
		$menu = \App\menu::where('shopId',$request)->where('flag',true)->get();
		return view('menu',compact('menu','shop','name'));

	}
    public function home()
    {
        $shop = \App\shop::All();   
        return view('canteen',compact('shop'));

    }

    //  public function menu()
    // {
    //     $menu = \App\menu::All();
    //     return view('shop.menu',compact('menu'));
    // }
}

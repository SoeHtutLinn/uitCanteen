<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Cookie;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function profile()
    {
        $shop = \App\shop::All();
        return view('user.profile',compact('shop'));
    }
    public function cart(Request $request)
    {
        
        
        $shop = \App\shop::All();
        $order = [];
        $total = 0;
        $totalQty = 0;
        


        foreach ($shop as $key => $item) 
        {

 
            if (isset($_COOKIE['menu'.$item->id])  && !empty($_COOKIE['menu'.$item->id])) 
            {
                $menu = explode(",", $_COOKIE['menu'.$item->id]);
                $quantity = explode(",", $_COOKIE['quantity'.$item->id]);

                foreach ($menu as $sub=> $data)
                {
                   $menuDetail[] = \App\menu::where('id',$data)->get();
                   $total += $menuDetail[$sub][0]->price * $quantity[$sub];
                   $totalQty += $quantity[$sub];
                   
                }
                
                $order[] = (object) array('shop' => $item->name,
                'shopId' => $item->id,
                'menu' => $menuDetail,
                'quantity' => $quantity,
                'totalQty' => $totalQty,
                'time' => Carbon::now(),
                'total' => $total);


                $menuDetail = null;
                $total = 0;
                $totalQty = 0;
            }  
        } 

        
        
        return view('user.cart',compact('order'));
    }
}

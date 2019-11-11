<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Cookie;
use App\order;
use App\orderDetail;
use Illuminate\Support\Facades\Input;
use Auth;

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
        $user = \App\User::where('id',Auth::user()->id)->get();
        $order = \App\order::where('studentId',Auth::user()->id)->where('flag','Z')->get();


        if(!empty ( $order[0] ))
        {
            
           foreach ($order as $orderDetail)

            {
                
                $menu = \App\orderDetail::where('orderId',$orderDetail->id)->get();

                foreach ($menu as $menuDetail) 
                {

                    $menus[] = \App\menu::where('id',$menuDetail->menuId)->get();
                    $quantity[] = $menuDetail->quantity;
                }

                $orders[] = (object) array(
                    'id' => $orderDetail->id,
                    'shop' => \App\shop::where('id',$orderDetail->shopId)->get('name'),
                    'menus' => $menus,
                    'total' => $orderDetail->total,
                    'quantity' => $quantity,
                    'time' => $orderDetail->created_at
                    );
                $menus = null;
                $quantity = null;
            }
        }
        else
        {
            
            $orders = 0;
        }
        
        return view('user.profile',compact('shop','user','orders'));
        
    }

    public function cart(Request $request)
    {
        
        
        $shop = \App\shop::All();
        $order = [];
        $total = 0;
        $totalQty = 0;
        $time = [];
        


        foreach ($shop as $key => $item) 
        {

 
            if (isset($_COOKIE['menu'.$item->id])  && !empty($_COOKIE['menu'.$item->id])) 
            {
                $menu = explode(",", $_COOKIE['menu'.$item->id]);
                $quantity = explode(",", $_COOKIE['quantity'.$item->id]);

                foreach ($menu as $sub=> $data)
                {
                   $menuDetail[] = \App\menu::where('id',$data)->get();
                   // $total += $menuDetail[$sub][0]->price * $quantity[$sub];
                   //$totalQty += $quantity[$sub];
                   
                }
                $now = Carbon::now();
                $now->addHours(1);
                
                while ($now->hour < 23) 
                { 
                    

                    
                    $string = $now->format('h:00 A');
                    $now->addHours(1);
                    $string = $string.' '.$now->format('h:00 A');
                    $time[] = $string;

                                
                }

                

                
                $order[] = (object) array('shop' => $item->name,
                'shopId' => $item->id,
                'menu' => $menuDetail,
                'quantity' => $quantity,
                //'totalQty' => $totalQty,
                //'total' => $total
                'timeArray' => $time,
                'time' => Carbon::now()
                );


                $menuDetail = null;
                //$total = 0;
                //$totalQty = 0;
            }  
        } 

        
        
        return view('user.cart',compact('order','shop'));
    }

    public function order(Request $request)
    {

        
        $user = Input::get('user');
        $time = Input::get('time');
        $date = Carbon::now();
        $i = 0;
        $total = Input::get('total'.$i);
        $shop = Input::get('shop'.$i);
        @dd($time->hour());//having error in passing date. I get string instead of date. Good luck :3
        while ($shop != null) {

            $key = Input::get('user')+strtotime(Carbon::now())+$i;


            $order = new order;
            $order->id = $key;
            $order->studentId = $user;
            $order->shopId = $shop;
            $order->takingTime = $time;
            $order->total = $total;
            $order->orderCode = $key;
            $order->save();
            
            
            $j = 0;

            $item = Input::get('item'.$i.$j);
            $quantity = Input::get('item-qty'.$i.$j);


            while ($item != null) {
                $orderDetail = new orderDetail;
                $orderDetail->orderId = $order->id;
                
                $orderDetail->menuId = $item;
                $orderDetail->quantity = $quantity;
                $orderDetail->save();

                $j++;
                $item = Input::get('item'.$i.$j);
                $quantity = Input::get('item-qty'.$i.$j);
            }
            
           
            $i = $i+1;
            $shop =  Input::get('shop'.$i);
            $total = Input::get('total'.$i);

        }
       
        $shop = \App\shop::All();
        foreach ($shop as $key => $value) 
        {
            for($i = 0; $i<5; $i++)
            {
                    echo(Input::get('menu'.$value->id.$i));
            }
        }
        return redirect('/canteen');       
    }

}

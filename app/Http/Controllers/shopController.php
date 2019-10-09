<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
use Illuminate\Support\Facades\Input;
use Auth;

class shopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:shop');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shop()
    {
        return view('shop');
    }
     public function menu()
    {
        
        $menu = \App\menu::where('shopId',Auth::user()->id)->get();
        return view('shop.menu',compact('menu'));
    }
    public function newMenu(Request $request)
    {
        
        
        $menu = new menu;
        $file = Input::file('img');
        
        $filename = $file->getClientOriginalName(); // getting image extension
        $file->move('uploads/menu/', $filename);
        $menu->price = Input::get('price');
        $menu->name = Input::get('name');
        $menu->img = $filename;
        $menu->shopId = Input::get('shop');
        $menu->type = Input::get('type');
        $menu->save();
        return redirect('ownerMenu');        
        
    }

    public function flag(Request $request)
    {
        
        $id = $request->ids;
        $menu = \App\menu::where('shopId',$request->shop)->get();
        
             
        foreach ($menu as $value) 
        {
            if (is_array($id))
            {

                    if(in_array($value->id, $id))
                    {
                        $value->flag = 0;
                    }
                    else
                    {
                        $value->flag = 1;
                    }
            
                    
            }
            else{
                $value->flag = 1;
            }
            $value->save();
        }


         
         return redirect('ownerMenu');
                

        
       
        
        

    }

}

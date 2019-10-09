<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eyeCare;
use App\Products;
use App\hairCare;
use App\Order;
use Illuminate\Support\Facades\Input;


class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function hairEdit()
    {
        $hairCare = \App\hairCare::All();
        return view('adminViews.hairEdit',compact('hairCare'));
    }
    public function facialEdit()
    {
        $dry = \App\drySkinCare::All();
        $normal= \App\normalSkinCare::All();
        $oily = \App\oilySkinCare::All();
        $combination = \App\combinationSkinCare::All();
        $eye = \App\eyeCare::All();
        $neck = \App\neckCare::All();
        return view('adminViews.facialEdit',compact('eye'),compact('dry'),compact('oily'),compact('normal'),compact('combination'),compact('neck'));
    }
    public function bodyEdit()
    {
        $hairCare = \App\hairCare::All();
        return view('adminViews.bodyEdit',compact('hairCare'));
    }
    public function legEdit()
    {
        $eyeCare = \App\eyeCare::All();
        return view('adminViews.legEdit',compact('eyeCare'));
    }
    public function inventory()
    {
        $inbox = \App\Products::All();
        return view('adminViews.inventory',compact('inbox'));
    }
    public function order()
    {
        $data = \App\Order::All();
        $inventory = \App\Products::All();
        return view('adminViews.order',compact('data'),compact('inventory'));
    }

    public function inventoryAdd(Request $request)
    {

    $product = new Products;
    $file = Input::file('Img');

    $filename = $file->getClientOriginalName(); // getting image extension
    $file->move('inventory/', $filename);
    $product->p_price = Input::get('price');
    $product->p_name = Input::get('name');
     $product->p_quantity = Input::get('quantity');
    $product->p_img = $filename;
    $product->p_type = Input::get('type');
    $product->p_cosmetic = Input::get('cosmetic');
    
    $product->save();

    echo "Uploded";
    
    return redirect()->back();
    }

    public function inventoryUpdate(Request $request)
    {
        $id = Input::get('id');
        $product = \App\Products:: where('p_Id', $id)->first();
        $file = Input::file('productImg');
        
        if ($file == null) 
        {
            $filename = Input::get('oldImg');
        }

        else
        {
            $filename = $file->getClientOriginalName(); // getting image extension
            $file->move('inventory/', $filename);
        }

        $product->p_price = Input::get('price');
        $product->p_name = Input::get('name');
        $product->p_img = $filename;
        $product->p_type = Input::get('type');
        $product->p_cosmetic = Input::get('cosmetic');
        $product->p_quantity = Input::get('quantity');
        $product->save();  
        return redirect()->back();

    }

    public function inventoryDelete($p_id)
    {
    $product = \App\Products:: where('p_Id', $p_id)->first();
    $product->delete();
    return redirect()->back();

    }

    public function eyeUpdate(Request $request)
    {
        $id = Input::get('id');
        $fact = \App\eyeCare:: where('id', $id)->first();
        $fact->fact = Input::get('fact');
        $fact->save();
        return redirect()->back();
    }

    public function dryUpdate(Request $request)
    {
        $id = Input::get('id');
        $fact = \App\drySkinCare:: where('id', $id)->first();
        $fact->fact = Input::get('fact');
        $fact->save();
        return redirect()->back();
    }
    public function hairAdd(Request $request)
    {
         $fact = new hairCare;
         $fact->fact = Input::get('fact');
         $fact->save();
         return redirect()->back();
    }
    public function hairUpdate(Request $request)
    {
        $id = Input::get('id');
        $fact = \App\hairCare:: where('id', $id)->first();
        $fact->fact = Input::get('fact');
        $fact->save();
        return redirect()->back();
    }
    public function hairDelete($id)
    {
    $product = \App\hairCare:: where('id', $id)->first();
    $product->delete();
    return redirect()->back();

    }
    
}

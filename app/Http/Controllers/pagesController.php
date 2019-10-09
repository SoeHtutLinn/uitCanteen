<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\normalFacialCare;
use Illuminate\Support\Facades\Input;

class pagesController extends Controller
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
    public function home()
    {
        return view('home');
    }
    public function face()
    {
        return view('facialCare');
    }

    public function eye()
    {
        $fact = \App\eyeCare::All();
        $product = \App\Products::All();
        return view('Facial.eyeCare',compact('product'),compact('fact'));
    }
    public function skinCare()
    {
        $product = \App\Products::where('p_type','Dry Skin Care')->orWhere('p_type','Normal Skin Care')->orWhere('p_type','Combination Skin Care')->orWhere('p_type','Oily Skin Care')->get();
        return view('skinCare',compact('product'));
    }
    public function drySkinCare()
    {
        $fact = \App\eyeCare::All();
        $product = \App\Products::where('p_type','Dry Skin Care')->get();
        return view('Facial.DrySkinCare',compact('product'),compact('fact'));
    } 
    public function normalSkinCare()
    {
        $fact = \App\eyeCare::All();
        $product = \App\Products::where('p_type','Normal Skin Care')->get();
        return view('Facial.normalSkinCare',compact('product'),compact('fact'));
    }  
     public function combinationSkinCare()
    {
        $fact = \App\eyeCare::All();
        $product = \App\Products::where('p_type','Combination Skin Care')->get();
        return view('Facial.combinationSkinCare',compact('product'),compact('fact'));
    }
     public function oilySkinCare()
    {
        $fact = \App\eyeCare::All();
        $product = \App\Products::where('p_type','Oily Skin Care')->get();
        return view('Facial.oilySkinCare',compact('product'),compact('fact'));
    } 

    public function upload()
    {
        dd(Input::get('fact'));
    }
    public function hairCare()
    {
        $fact = \App\hairCare::All();
        $product = \App\Products::where('p_type','Hair Care')->get();
        return view('hairCare',compact('product'),compact('fact'));
    }
    

    
}

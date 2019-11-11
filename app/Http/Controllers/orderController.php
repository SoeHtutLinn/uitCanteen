<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
use Illuminate\Support\Facades\Input;
use Auth;

class orderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function unAccept($request)
    {
        $order = \App\order::where('id',$request)->get();
        $order[0]->flag = 'F';
        $order[0]->save();
        return redirect('/newOrder'); 
    }

    public function accept($request)
    {
        $order = \App\order::where('id',$request)->get();
        $order[0]->flag = 'T';
        $order[0]->save();
        return redirect('/newOrder'); 
    }

    public function ready($request)
    {
        $order = \App\order::where('id',$request)->get();
        $order[0]->flag = 'R';
        $order[0]->save();
        return redirect('/acceptedOrder'); 
    }

    public function taken($request)
    {
        $order = \App\order::where('id',$request)->get();
        $order[0]->flag = 'Z';
        $order[0]->save();
        return redirect('/acceptedOrder'); 
    }


}

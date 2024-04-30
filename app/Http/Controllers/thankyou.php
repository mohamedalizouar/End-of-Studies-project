<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cart;
class thankyou extends Controller


{
    public function index()
    {
        $itemcarts = Cart::where('userid', auth()->user()->id)->get();

        return view('thankyou',compact('itemcarts'));

      
    }

}

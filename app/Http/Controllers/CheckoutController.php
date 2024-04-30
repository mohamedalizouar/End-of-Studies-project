<?php

namespace App\Http\Controllers;
use App\Models\cart;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Afficher la page de paiement / de caisse
        $itemcarts = Cart::where('userid', auth()->user()->id)->get();
        return view('checkout',compact('itemcarts'));
    }

  
}

<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Cart;
class cardController extends Controller
{

    public function index()
    {
        
        $cartItems = Cart::instance('card')->content();

        return view ('card',['cartItems'=>$cartItems]);
    }

 public function addToCart(Request $request)
    {
      
       $Produit= Produit::find($request->id);
        
 
        $price = $Produit->sale_price ? $Produit->sale_price : $Produit->regular_price ; 
        Cart::instance('card')->add($Produit->id,$Produit->name,$request->quantity,$price)->associate('App\Models\Product');
        return redirect()->back()->with('message','success ! Item has been added sucessfully!') ; 
    }


   
    public function updateCart(Request $request)
    {
        Cart::instance('card')->update($request->rowId,$request->quantity);
        return redirect()->route('card.index');


    }
    public function   removeItem(Request $request) 
    {

       $rowId = $request->rowId ;
       Cart::instance('card')->remove($rowId);
       return redirect()->route('card.index');
    }

    public function   clearCart() 
{
    Cart::instance('card')->destroy();
    return redirect()->route('card.index');

}


}

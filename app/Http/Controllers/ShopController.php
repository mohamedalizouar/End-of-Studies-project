<?php

namespace App\Http\Controllers;

use App\Models\Produit ;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
         
        $produits=Produit::orderBy('Created_at','DESC')->paginate(12);
        return view('shop',['produits'=>$produits]);
    }

    public function productDetails($slug)
    {
       
        $produit = Produit::where('slug',$slug)->first();

        $rproduits = Produit::where('slug','!=',$slug)->inRandomOrder('id')->get()->take(8);

        return view('details', compact('produit', 'rproduits'));

    }
}

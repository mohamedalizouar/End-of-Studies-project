<?php

namespace App\Http\Controllers;

use App\Models\User;
 use App\Models\cart;
use App\Models\Commande;
use App\Models\commandesdutil;
use App\Models\Product;
use Illuminate\Http\Request; 

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $itemcarts = Cart::where('userid', auth()->user()->id)->get();
        return view('cart.index', compact('itemcarts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $products = Product::all(); // Récupérer tous les produits disponibles
        return view('cart.create', compact('products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',


        ]);


        $itemcarts = Cart::where('userid', auth()->user()->id);

        // // Vérifier si le produit est déjà dans le panier
        $existingCartItem = $itemcarts->where('product_id', $request->product_id)->first();

        // cartItems()->
        if ($existingCartItem) {
            $cart_item = Cart::findOrFail($existingCartItem->id);
            $cart_item->userid  = auth()->user()->id;
            $cart_item->quantity = $request->quantity + $existingCartItem->quantity;
            $cart_item->product_id = $request->product_id;
            $cart_item->save();
            // Mettre à jour la quantité si le produit est déjà dans le panier
            $existingCartItem->update(['quantity' => $existingCartItem->quantity + $request->quantity]);
        } else {
            $cart_item = new Cart();
            $cart_item->userid  = auth()->user()->id;
            $cart_item->quantity = $request->quantity;
            $cart_item->product_id = $request->product_id;
            $cart_item->save();
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function confirmCart()
    { 
      
        $user = auth()->user();
        $cartItems = Cart::where('userid',$user->id)->get();
        //dd($cartItems);
        $totalcartItems = $cartItems->sum(function ($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
            
        });

        $commande = new Commande();
        $commande->user_id   = $user->id;
        $commande->status ="pending";
        $commande->totale = $totalcartItems;
        $commande->save();

        foreach ($cartItems as $cartItem) {
            $commandesdutil = new Commandesdutil();
            $commandesdutil->user_id = $user->id;
            $commandesdutil->cammandes_id = $commande->id;
            $commandesdutil->product_id = $cartItem->product_id;
            $commandesdutil->quantity = $cartItem->quantity;
            $commandesdutil->total_amount = ($cartItem->product->price)*$cartItem->quantity;
           
            $commandesdutil->save();
            // dd($commandesdutil);
        }

        // Supprimez les éléments du panier après la création de la commande
   

        foreach ($cartItems as $c) {
           $c->delete();
        }

        return response()->json(['message' => 'Command created successfully']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $request->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { {
            Cart::destroy($id);

            return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully!');
        }
    }
}

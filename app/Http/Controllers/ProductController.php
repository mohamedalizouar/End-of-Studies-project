<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Produit;
use App\Models\Product;


use App\Models\Categori;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $produits = Produit::with('Categori')->get();

        return view('product.index', compact('produits'));
    }

    public function create()
    {
        $categoris = Categori::all();
        $brands = Brand::all() ; 

        return view('product.create', compact('categoris'), compact('brands'));
    }

    // public function store(Request $request)
    // {
    //     // Validation des données du formulaire
    //     $request->validate([
    //         'name' => 'required|string',
    //         'price' => 'required|numeric',
    //         'description' => 'nullable|string',
    //         'image' => 'nullable|string',



    //     ]);

    //     $product= new Produit();
    //     $product->name =  $request->name;
    //     $product->slug =  $request->slug;
    //     $product->short_description=  $request->short_description;
    //     $product->Description =  $request->price;
    //     $product->regular_price =  $request->regular_price;
    //     $product->sale_price =  $request->sale_price;
    //     $product->SKU =  $request->SKU;
    //     $product->stock_status =  $request->stock_status;
    //     $product->featured=  $request->featured;
    //     $product->quantity=  $request->quantity;
    //     $product->image =  $request->image;
    //     $product->images =  $request->images;
    //     $product->categori_id = $request->categori;
    //     $product->brand_id = $request->brand;
        
       
 
        
        
    //     // Création d'un nouveau produit
    //     $product->save();
    //     // Product::create($request->all());

    //     return redirect('shop')->with('success', 'Product added successfully!');
    // }

    public function store(Request $request)
{
    // Validation des données du formulaire
    $request->validate([
        'name' => 'required|string',
        'slug' => 'nullable|string',
        'short_description' => 'nullable|string',
        'description' => 'nullable|string',
        'regular_price' => 'required|numeric',
        'sale_price' => 'nullable|numeric',
        'SKU' => 'nullable|string',
        'stock_status' => 'nullable|in:instock,outofstock',
        'quantity' => 'required|integer',
        'image' => 'nullable|string',
        'images' => 'nullable|string',
        'categori_id' => 'nullable|integer',
        'brand_id' => 'nullable|integer',
    ]);
    
    $product= new Produit();
    $product->name =  $request->name;
    $product->slug =  $request->slug;
    $product->short_description=  $request->short_description;
    $product->description =  $request->description;
    $product->regular_price =  $request->regular_price;
    $product->sale_price =  $request->sale_price;
    $product->SKU =  "ddd";
    $product->stock_status = "instock";
    $product->featured=  $request->featured;
    $product->quantity=  $request->quantity;
    $product->image =  $request->image;
    $product->images =  $request->images;
    $product->categori_id = $request->categori;
    $product->brand_id = $request->brand;
    $product->save();

    return redirect('shop')->with('success', 'Product added successfully!');
}


    public function destroy(Produit $product)
    {
        // Suppression du produit
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted successfully!');
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
        'slug' => 'nullable|string',
        'short_description' => 'nullable|string',
        'description' => 'nullable|string',
        'regular_price' => 'required|numeric',
        'sale_price' => 'nullable|numeric',
        'SKU' => 'nullable|string',
        'stock_status' => 'nullable|in:instock,outofstock',
        'quantity' => 'required|integer',
        'image' => 'nullable|string',
        'images' => 'nullable|string',
        'categori_id' => 'nullable|integer',
        'brand_id' => 'nullable|integer',

        ]);

        $product = Produit::findOrFail($id);       
        $product->name =  $request->name;
        $product->slug =  $request->slug;
        $product->short_description=  $request->short_description;
        $product->description =  $request->description;
        $product->regular_price =  $request->regular_price;
        $product->sale_price =  $request->sale_price;
        $product->SKU =  "ddd";
        $product->stock_status = "instock";
        $product->featured=  $request->featured;
        $product->quantity=  $request->quantity;
        $product->image =  $request->image;
        $product->images =  $request->images;
        $product->categori_id = $request->categori;
        $product->brand_id = $request->brand;
        

        $product->update();
        // Product::create($request->all());

        return redirect('/products')->with('success', 'Product update successfully!');
    }
    public function edite($id)
    {
        $product = Produit::findOrFail($id);

        $categories = Categori::all();
        $brands = Brand::all();

        return view('product.edite', compact('categories', 'product', 'brands'));
    }


    public function show(string $id)
    {
        $product = Produit::findOrFail($id);


        return view('product.show', compact('product'));
    }


    public function addToCart(Request $request)
    {
       
  
     

        $itemcarts = Cart::where('userid',auth()->user()->id);

    // // Vérifier si le produit est déjà dans le panier
    $existingCartItem = $itemcarts->where('product_id', $request->product_id)->first();

    // cartItems()->
    if ($existingCartItem) {
        $cart_item = Cart::findOrFail($existingCartItem->id);
        $cart_item->userid  = auth()->user()->id;
        $cart_item->quantity = 1 + $existingCartItem->quantity;
        $cart_item->product_id = $request->product_id;
        $cart_item->save();
        // Mettre à jour la quantité si le produit est déjà dans le panier
        $existingCartItem->update(['quantity' => $existingCartItem->quantity + 1]);
    } else {
        $cart_item = new Cart();
        $cart_item->userid  = auth()->user()->id;
        $cart_item->quantity = 1;
        $cart_item->product_id = $request->product_id;
        $cart_item->save();
    }

    return redirect()->route('product.index')->with('success', 'Product added to cart successfully!');
}
    
    


}

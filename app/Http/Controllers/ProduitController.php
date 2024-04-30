<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Produit::with('Categori')->get();

        return view('creat', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       

        return view('creat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|string',



        ]);

        $product = new Produit();
        $product->product_name =  $request->name;
        $product->price =  $request->price;
        $product->description =  $request->description;
        $product->image = $request->image;
        $product->categories_id = $request->category;
        // Création d'un nouveau produit
        $product->save();
        // Product::create($request->all());

        return redirect('shop')->with('success', 'Product added successfully!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;
use App\Models\Produit;
use App\Models\Categori;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categori::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categori::all();

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $category = new Categori();
        $category->name =  $request['name'];
        $category->Slug=  $request['slug'];
        $category->image = $request['image'];

        // Création d'un nouveau categories
        $category->save();
        // category::create($request->all());

        return redirect('/category')->with('success', 'category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       return"tEST";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
            $category = Categori::findOrFail($id);

            return view('category.edite', compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        
        // $id =  $request['id'];
        $category = Categori::findOrFail($id);
        $category->name =  $request->input('name');
        $category->slug =  $request->input('slug');
        $category->image = $request->input('image');

        // $category->update();
        $category->update();
        //  categories::create($request->all());
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');

        // return redirect('category.index')->with('success', 'category update su ccessfully!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        Categori::destroy($id) ;
   

        return redirect('/category')->with('success', 'category deleted successfully!') ;
    }
}
